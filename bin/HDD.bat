
:efipartition
cls
set /a num=1 & call "%~dp0colortool.bat"
echo.
echo.
echo 	 %_lang0017_%           %_lang0002_% (MB)
echo 	======================================         ===============
echo 	^* Fedora                                             1800
echo 	^* Bitdefender                                         800
echo 	^* Kali Linux                                         2800
echo 	^* DrWeb Live CD                                       800
echo 	^* bootra1n                                            500
echo 	======================================         ===============
echo 	^* %_lang0003_%                                        6700
echo.
echo - %_lang0004_%
echo - %_lang0018_% = 4096 MB
echo.
set add=0
echo.
set /p add= ^> %_lang0010_% [ MB ] ^= 
