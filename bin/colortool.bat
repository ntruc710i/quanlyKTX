@echo off
rem >> https://niemtin007.blogspot.com
rem >> batch file write by niemtin007. Thank you for using.

cls
set /a num=%random% %%2 +1
set "itermcolors=%num%.itermcolors"
if "%color%"=="true" goto :skipcheck

rem Check for DotNet 4.0 Install
set "checkdotnet=%temp%\Output.log"
reg query "HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\NET Framework Setup\NDP" /s | find "v4" > %checkdotnet%
if %errorlevel% equ 0 (
    %~dp0colortool -b -q %itermcolors%
    set "color=true"
    goto :exit
) else (
    set "color=false"
    goto :exit
)

:skipcheck
%~dp0colortool -b -q %itermcolors%

:exit
rem echo colortool %itermcolors%
rem timeout /t 2 >nul
cls
