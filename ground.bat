@ECHO off
cls
call npm install
:start
ECHO.
ECHO Please select which tasks Ground should run
ECHO 1 - Run Development task
ECHO 2 - Run Deploy task
set /p choice=Choose the task number and hit enter:
if '%choice%'=='1' goto Development
if '%choice%'=='2' goto Deploy
ECHO.
goto start
:Development
grunt
goto end
:Deploy
grunt Deploy
goto end
:end
pause
