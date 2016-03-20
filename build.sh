#!/bin/bash
# simple shell script to build project

if [ "$#" -gt 0 -a "$1" = "-h" ]
then
  echo ""
  echo "NAME"
  echo "     build -- builds S!zzle project"
  echo ""
  echo "SYNOPSIS"
  echo "     ./build.sh [-h] [project]"
  echo ""
  echo "DESCRIPTION"
  echo "     This tool is for building & pushing the S!zzle project. Choosing the project option master or staging."
  echo ""
  echo "     The following options are available:"
  echo ""
  echo "     -h     Print this help screen"
  echo ""
  exit
fi

# run PHP unit tests
./vendor/bin/phpunit --bootstrap src/tests/autoload.php -c tests.xml
echo ""

# build polymer
npm run polybuild
echo "Polybuild finished."
echo ""

# minify css
npm run css
echo "CSS minified"
echo ""

# minify javascript
npm run js
npm run json
echo "JavaScript minified"
echo ""

# update public components - this needs tweeking
#rm -rf public/components
#cp -r components public/components
#echo "Components updated"
#echo ""

# run Mocha unit tests
echo "Running JavaScript tests"
npm run test
echo ""

# see what's changed
git status

# push it up to github
if [ "$#" -gt 0 ]
then
  echo ""
  case $1 in
#    "master") do nothing
    "staging") git push github develop ;;
#    *) do nothing ;;
  esac
fi
