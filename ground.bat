@ECHO off
cls
call npm install
:start
ECHO.
ECHO Please select which tasks Ground should run
ECHO 1 - Run Dev task
ECHO 2 - Run Deploy task
set /p choice=Choose the task number and hit enter:
if '%choice%'=='1' goto dev
if '%choice%'=='2' goto deploy
if '%choice%'=='3' goto quit
ECHO.
goto start
:dev
grunt
goto end
:deploy
grunt deploy
goto end
:quit
exit /b
goto end
:end
pause
