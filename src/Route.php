<?php
namespace Sizzle;

/**
 * This class is for routing URI requests
 */
class Route
{
    protected $default;
    protected $endpointPieces;
    protected $endpointMap;
    protected $gets;

    /**
     * Includes appropriate file based on the provided endpoint pieces
     *
     * @param array $endpointPieces - the parsed pieces of the endpoint
     * @param array $gets           - associative array of GET variables
     */
    public function __construct(array $endpointPieces, array $gets = array())
    {
        if (is_array($endpointPieces)) {
            $this->endpointPieces = $endpointPieces;
            $this->gets = $gets;
        }
        $this->default = __DIR__.'/../error.php';
    }

    /**
     * Includes appropriate file based on the provided endpoint pieces
     *
       PLEASE ADD A TEST TO src/RoutingTest.php FOR EACH ENDPOINT ADDED HERE
     */
    public function go()
    {
        if (!isset($this->endpointPieces[1])) {
            include __DIR__.'/../login.php';
        } else {
            switch ($this->endpointPieces[1]) {
            case '':
            case 'index.html':
                include __DIR__.'/../login.php';
                break;
            case 'admin':
                if (!isset($this->endpointPieces[2]) || '' == $this->endpointPieces[2]) {
                    include __DIR__.'/../admin/index.php';
                } else {
                    switch ($this->endpointPieces[2]) {
                    case 'active_users':
                        include __DIR__.'/../admin/active_users.php';
                        break;
                    case 'city':
                        include __DIR__.'/../admin/city.php';
                        break;
                    case 'create_account':
                        include __DIR__.'/../admin/create_account.php';
                        break;
                    case 'edit_organization':
                        include __DIR__.'/../admin/edit_organization.php';
                        break;
                    case 'no_card_customers':
                        include __DIR__.'/../admin/no_card_customers.php';
                        break;
                    case 'organizations':
                        include __DIR__.'/../admin/organizations.php';
                        break;
                    case 'recruiter_profile':
                        include __DIR__.'/../admin/recruiter_profile.php';
                        break;
                    case 'send_token':
                        include __DIR__.'/../admin/send_token.php';
                        break;
                    case 'stalled_new_customers':
                        include __DIR__.'/../admin/stalled_new_customers.php';
                        break;
                    case 'tokens':
                        include __DIR__.'/../admin/token_stats.php';
                        break;
                    case 'transfer_token':
                        include __DIR__.'/../admin/transfer_token.php';
                        break;
                    case 'users':
                        include __DIR__.'/../admin/users.php';
                        break;
                    case 'visitors':
                        include __DIR__.'/../admin/visitors.php';
                        break;
                    default:
                        include $this->default;
                    }
                }
                break;
            case 'ajax':
                include __DIR__.'/../ajax/route.php';
                break;
            case 'experiment':
                include __DIR__.'/../experiment_info.php';
                break;
            case 'bot_list':
                include __DIR__.'/../bot_list.php';
                break;
            case 'experiments':
                include __DIR__.'/../experiments.php';
                break;
            case 'invoice':
                include __DIR__.'/../invoice.php';
                break;
            case 'iframe_code':
                include __DIR__.'/../iframe_code.php';
                break;
            case 'issues':
                include __DIR__.'/../issues.php';
                break;
            case 'js':
                if (!isset($this->endpointPieces[2]) || '' == $this->endpointPieces[2]) {
                    include $this->default;
                } else {
                    switch ($this->endpointPieces[2]) {
                    default:
                        include $this->default;
                    }
                }
                break;
            case 'organization':
                include __DIR__.'/../admin/org_info.php';
                break;
            case 'queue':
                include __DIR__.'/../queue.php';
                break;
            case 'report':
                if (isset($this->endpointPieces[2]) && '' != $this->endpointPieces[2]) {
                    switch ($this->endpointPieces[2]) {
                    case 'inactive_organizations':
                        include __DIR__.'/../report/inactive_organizations.php';
                        break;
                    case 'org_growth':
                        include __DIR__.'/../report/org_growth.php';
                        break;
                    case 'response_rate':
                        include __DIR__.'/../report/response_rate.php';
                        break;
                    case 'token_breakdown':
                        include __DIR__.'/../report/token_breakdown.php';
                        break;
                    case 'tokens_created':
                        include __DIR__.'/../report/tokens_created.php';
                        break;
                    case 'usage_growth':
                        include __DIR__.'/../report/usage_growth.php';
                        break;
                    case 'user_cohorts':
                        include __DIR__.'/../report/user_cohorts.php';
                        break;
                    case 'user_growth':
                        include __DIR__.'/../report/user_growth.php';
                        break;
                    default:
                        include $this->default;

                    }
                }
                break;
            case 'stories':
                include __DIR__.'/../stories.php';
                break;
            case 'story':
                include __DIR__.'/../story.php';
                break;
            case 'teapot':
                include __DIR__.'/../teapot.php';
                break;
            case 'tokens':
                include __DIR__.'/../tokens.php';
                break;
            case 'token_responses':
                include __DIR__.'/../token_responses.php';
                break;
            case 'token_stats':
                include __DIR__.'/../token_stats.php';
                break;
            case 'upload':
                include __DIR__.'/../upload.php';
                break;
            case 'user':
                include __DIR__.'/../admin/user_info.php';
                break;
            case 'test':
                // this endpoint is just for non-production testing
                if (ENVIRONMENT != 'production') {

                }
            case 'zdrip':
                // this endpoint is just for non-production testing
                if (ENVIRONMENT != 'production') {
                    include __DIR__.'/../deploy_develop.php';
                    break;
                }
            default:
                include $this->default;
            }
        }
    }

    /**
     * Register an endpoint for routing.
     *
     * @param string $endpoint   - the URI endpoint to process
     * @param string $fileToLoad - file to load for that endpoint
     *
     * @return boolean - was registration successful
     */
    public function register($endpoint, $fileToLoad)
    {
        $endpoint = ltrim($endpoint, '/');
        $endpointParts = explode('/', $endpoint);
        switch (count($endpointParts)) {
        case 0:
            $this->endpointMap[''] = $fileToLoad;
            break;
        case 1:
            $this->endpointMap[$endpointParts[0]] = $fileToLoad;
            break;
        case 2:
            if (!isset($this->endpointMap[$endpointParts[0]])) {
                $this->endpointMap[$endpointParts[0]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]])) {
                    $temp = $this->endpointMap[$endpointParts[0]];
                    $this->endpointMap[$endpointParts[0]] = array();
                    $this->endpointMap[$endpointParts[0]][''] = $temp;
                }
            }
            $this->endpointMap[$endpointParts[0]][$endpointParts[1]] = $fileToLoad;
            break;
        case 3:
            if (!isset($this->endpointMap[$endpointParts[0]])) {
                $this->endpointMap[$endpointParts[0]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]])) {
                    $temp = $this->endpointMap[$endpointParts[0]];
                    $this->endpointMap[$endpointParts[0]] = array();
                    $this->endpointMap[$endpointParts[0]][''] = $temp;
                }
            }
            if (!isset($this->endpointMap[$endpointParts[0]][$endpointParts[1]])) {
                $this->endpointMap[$endpointParts[0]][$endpointParts[1]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]][$endpointParts[1]])) {
                    $temp = $this->endpointMap[$endpointParts[0]][$endpointParts[1]];
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]] = array();
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]][''] = $temp;
                }
            }
            $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]] = $fileToLoad;
            break;
        case 4:
            if (!isset($this->endpointMap[$endpointParts[0]])) {
                $this->endpointMap[$endpointParts[0]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]])) {
                    $temp = $this->endpointMap[$endpointParts[0]];
                    $this->endpointMap[$endpointParts[0]] = array();
                    $this->endpointMap[$endpointParts[0]][''] = $temp;
                }
            }
            if (!isset($this->endpointMap[$endpointParts[0]][$endpointParts[1]])) {
                $this->endpointMap[$endpointParts[0]][$endpointParts[1]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]][$endpointParts[1]])) {
                    $temp = $this->endpointMap[$endpointParts[0]][$endpointParts[1]];
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]] = array();
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]][''] = $temp;
                }
            }
            if (!isset($this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]])) {
                $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]] = array();
            } else {
                if (!is_array($this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]])) {
                    $temp = $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]];
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]] = array();
                    $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]][''] = $temp;
                }
            }
            $this->endpointMap[$endpointParts[0]][$endpointParts[1]][$endpointParts[2]][$endpointParts[3]] = $fileToLoad;
            break;
        }
    }
}
