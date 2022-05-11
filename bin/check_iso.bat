:CheckISO

if not exist *Anhdv*.ISO (
if not exist *Anhdv*.ISO Rename *.ISO AnhdvBoot.ISO
Title One Click Anhdv Boot 2019 [anhdvboot.com] & cls& Color 3F
echo.
echo ======================================================================
echo.  
echo   	KHONG TIM THAY FILE "ISO" HOAC FILE BI HONG.           
echo   	Download *AnhdvBoot*.ISO: anh-dv.com
echo   	SAU DO COPY FILE VAO CUNG NOI VOI 1_Click_AnhdvBoot.exe
echo.
echo ======================================================================
echo    BAM PHIM BAT KY DE TIEP TUC...!& pause>nul& goto CheckISO
)
