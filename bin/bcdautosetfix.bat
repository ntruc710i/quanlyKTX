@echo off
cls
cd /d "%~dp0"
call "%~dp0\colortool.bat"
echo.
echo %_lang0006_%
echo.

if "%usb%"=="true" (
	call :scan.label USB-DATA
	if [%ducky%] EQU [] (
		Set ducky=X:
	)
)
if "%externaldisk%"=="true" (
	call :scan.label HDD-DATA
	if [%ducky%] EQU [] (
		Set ducky=X:
	)
)
call :SetBCD
call :SetB32
call :SetWIN
exit /b

:SetBCD
set "bcd=%~dp0BCD"
set "Object={7619dcc8-fafe-11d9-b411-000476eba25f}"
set "bootfile=\WINSETUP\Windows10_2004_64bit\sources\boot.wim"
set "identifier={c1c20659-4329-4ff0-9546-2c4275d4359e}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1909_64bit\sources\boot.wim"
set "identifier={16bda364-66af-4e70-9630-3349e0c78a9a}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1903_64bit\sources\boot.wim"
set "identifier={af66bd1f-329d-45c4-99a2-393dfd52903f}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1809_64bit\sources\boot.wim"
set "identifier={5a76b465-7ba2-4adf-bea5-0affc5a6cab1}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1607_64bit\sources\boot.wim"
set "identifier={7b31cd24-e74f-4e41-9d92-4a27213f76ef}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows81_64bit\sources\boot.wim"
set "identifier={7ab25b64-526e-44a3-a6a1-77f914edb1d4}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows7_SP1_64bit\sources\boot.wim"
set "identifier={de7b1480-0322-49d3-a92b-631b8d8beb60}"
call :bcd.reset
exit /b 0

:SetB32
set "bcd=%~dp0B32"
set "Object={7619dcc8-fafe-11d9-b411-000476eba25f}"
set "bootfile=\WINSETUP\Windows10_2004_32bit\sources\boot.wim"
set "identifier={7ab1d44a-a278-4478-871d-bcc37bb36f6f}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1909_32bit\sources\boot.wim"
set "identifier={46b211a8-7bd9-49a7-baaf-db9f38210ee6}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1903_32bit\sources\boot.wim"
set "identifier={16bda364-66af-4e70-9630-3349e0c78a9a}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1809_32bit\sources\boot.wim"
set "identifier={5a76b465-7ba2-4adf-bea5-0affc5a6cab1}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1607_32bit\sources\boot.wim"
set "identifier={be04f3bc-597f-42ed-aa14-0ea02e076a42}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows81_32bit\sources\boot.wim"
set "identifier={de7b1480-0322-49d3-a92b-631b8d8beb60}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows7_SP1_32bit\sources\boot.wim"
set "identifier={bb8e1ac4-98fa-448d-ae43-7987cd062c00}"
call :bcd.reset
exit /b 0

:SetWIN
set "bcd=%~dp0WIN"
set "Object={7619dcc8-fafe-11d9-b411-000476eba25f}"
set "bootfile=\WINSETUP\Windows10_2004_64bit\sources\boot.wim"
set "identifier={da2def1d-6e1a-4006-9b75-67e61e55f1c0}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1909_64bit\sources\boot.wim
set "identifier={49098e66-148a-463e-bfeb-e71a8db453c1}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1903_64bit\sources\boot.wim"
set "identifier={51820e1a-b29a-462e-bdf3-d5d23fad4a02}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1809_64bit\sources\boot.wim"
set "identifier={6eeac3bf-1b73-473f-82ca-6026186e13a0}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1607_64bit\sources\boot.wim"
set "identifier={607809a1-e551-42f2-98ed-daaae20229da}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows81_64bit\sources\boot.wim"
set "identifier={645806d4-329a-4f03-a61d-2bc0dd1291ed}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows7_SP1_64bit\sources\boot.wim"
set "identifier={e6e4970d-40ad-401e-9fad-913ba94205a5}"
call :bcd.reset
set "Object={7619dcc9-fafe-11d9-b411-000476eba25f}"
set "bootfile=\WINSETUP\Windows10_2004_32bit\sources\boot.wim"
set "identifier={5ae549af-a808-488d-a277-1b75def05b88}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1909_32bit\sources\boot.wim"
set "identifier={c9020ac6-1e00-47bc-8ebf-cfcaaf1a3e05}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1903_32bit\sources\boot.wim"
set "identifier={8f1d4ce1-59f4-45d9-a20c-b66baa5c342e}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1809_32bit\sources\boot.wim"
set "identifier={089d541c-0032-40b3-ba46-f7ba91af87d3}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows10_1607_32bit\sources\boot.wim"
set "identifier={ccfa6c85-2d5b-498e-90e4-746bd43bb7e3}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows81_32bit\boot.wim"
set "identifier={bddc640e-a44f-4bcc-a641-d5ef34c5b0cd}"
call :bcd.reset
set "bootfile=\WINSETUP\Windows7_SP1_32bit\sources\boot.wim"
set "identifier={08010a4a-f9ab-4145-8acf-cb79cca7eccd}"
call :bcd.reset
exit /b

:bcd.reset
bcdedit /store %bcd% /set %identifier% device ramdisk=[%ducky%]%bootfile%,%Object% > nul
bcdedit /store %bcd% /set %identifier% osdevice ramdisk=[%ducky%]%bootfile%,%Object% > nul
bcdedit /store %bcd% /set {ramdiskoptions} ramdisksdipath \boot\boot.sdi > nul
exit /b

:scan.label
for /f %%b in ('wmic volume get driveletter^, label ^| findstr /i "%~1"') do set "ducky=%%b"
if not defined ducky set "restart=true"
exit /b

:GPTU
cls
echo.& echo %_lang0036_%&echo %_lang0021_% & color 4f & pause >nul
exit

:GPTH
cls
echo.& echo %_lang0037_%&echo %_lang0021_% & color 4f & pause >nul
exit