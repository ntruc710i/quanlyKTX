@echo off
:Language
	cls& echo.& echo Select a Language?
	echo.& echo  [1]: Vietnamese& echo  [2]: English& echo.
		set Lang=
		set /P Lang= Select [ ? ] = 
		IF %lang%==1 goto :Vietnam
		IF %lang%==2 goto :English
		if not errorlevel 1 goto :Language

:English
    if "%processor_architecture%"=="x86" (
        "%~dp0SetupGreen32.exe" -i > nul
        "%~dp0LoadDrv_Win32.exe" -i > nul
    ) else (
        "%~dp0SetupGreen64.exe" -i > nul
        "%~dp0LoadDrv_x64.exe" -i > nul
    )


>"%~dp0cfg.ini" (
    echo [Language]
    echo LANGUAGE=lang\en.txt;9
    echo [CONFIG]
    echo COUNT=7
    echo KEY=AOSR-44393-SREDO-6P055
  	echo [Version]
	echo VERSION=7
	echo [PA]
    echo POPUPMESSAGE=0
    echo CHECKUPDATE=0
)
rem >> Notification
set "_lang0000_=^>^> PLEASE CHANGE YOUR DRIVE LETTER X:\ TO THE OTHER"
set "_lang0001_=ISO needs to boot on a USB-BOOT partition"
set "_lang0002_=INPUT"
set "_lang0003_=All        "
set "_lang0004_=If using any of the above ISO then add more capacity in the INPUT column"
Set "_lang0005_=Default capacity of USB-BOOT partition"
Set "_lang0006_=^>^> Setting up the boot menu for Windows Installation Package ..."
set "_lang0010_=Enter additional BOOT partition space (if not press Enter)"
set "_lang0011_=^>^> Thank you for using Anhdv Boot ^^_^^"
set "_lang0012_=^>^> Please wait..."
set "_lang0013_=^>^> Unplug USB and plug it in again!"
set "_lang0014_=^>^> If usb displays the wrong partition, enter Y below to fix the error."
set "_lang0015_=^>^> Have you disconnected the USB and plugged it back in? If not, do it now!"
set "_lang0016_=^>^> You have successfully created a USB BOOT!"
set "_lang0017_=ISO needs to boot on the HDD-BOOT partition"
Set "_lang0018_=Default capacity of HDD-BOOT partition"
Set "_lang0019_=^>^> Press any key to continue ..."
set "_lang0020_=^>^> Do you want to fix the wrong partition display error of USB? [ Y/N ] = "
set "_lang0021_=^>^> Press any key to exit ..."
set "_lang0022_=^!! If you really need to add capacity, do not press Enter to skip this step !!"
set "_lang0023_=Enter the amount you want to add to the existing HDD-Boot partition"
set "_lang0024_=^>^> You have successfully created a HDD Box BOOT!"
set "_lang0025_=^>^> Do you want to fix the wrong partition display error of HDD Box? [ Y/N ] = "
set "_lang0026_=^>^> Kaspersky Rescue Disk 18 is being copied, please wait..."
set "_lang0027_=^>^> Your computer is running"
set "_lang0028_=^>^> Therefore, only one USB partition can be displayed." 
set "_lang0029_=^>^> The USB-BOOT partition is displayed so Anhdv Boot can boot UEFI on all computers."
set "_lang0030_=^>^> If the USB-BOOT partition is hidden, some computers will not show USB UEFI."
set "_lang0031_=^>^> Disconnect the HDD Box, then unplug and plug it in again. * Note *: This is required!"
set "_lang0032_=^>^> Wait until the HDD-DATA partition appears in My computer and enter Y [ Y/N ] = "
set "_lang0033_=^>^> For booting process to succeed, you need to rename the HDD Box to HDD-DATA!"
set "_lang0034_=^>^> Have you renamed the HDD Box to HDD-DATA? [ Y/N ] = "
set "_lang0035_=^>^> Note: Do not close the program window, you must wait until it is completed"
set "_lang0036_=^>^> The program cannot create BOOT at this time. You need to reboot and try again"
set "_lang0037_=^>^> The first partition of the HDD Box has not been renamed to HDD-DATA. Rename and re-run"
set "_lang0038_=^>^> If the UEFI Boot fails, change the bootloader to [4] Bootmgr state by 1 click"

rem >> [ 01 ] Install
set "_lang0100_= ^*^*^*^* Note: ^*^*^*^*"
set "_lang0101_=^>^> Enter the number of the device you want to create boot"
set "_lang0102_=^>^>WARNING: The number you entered is not an external hard drive"
set "_lang0103_=^>^> Press any key to re-enter..."
set "_lang0104_=^>^> You entered wrong. Press any key to re-enter"
set "_lang0105_=^>^> You create usb boot with hidden partition? [ Y/N ] = "
set "_lang0106_=^>^> If you choose "Y", USB will split into two partitions:"
set "_lang0107_=^ ^ ^  1. The USB-BOOT (FAT32) partition containing the Anhdv Boot will be hidden."
set "_lang0108_=^ ^ ^  2. The USB-DATA partition (NTFS) to hold data and other boot packages."
set "_lang0109_=^>^> If "N" is selected, only USB-BOOT (FAT32) partitions are created."
set "_lang0110_=^ ^  Deleting USB..."
set "_lang0111_=^>^> This is not a USB/HDD Anhdv Boot, create a boot again!"
set "_lang0112_= ^- If USB is not in the list, enter the next number in the column "Number""
set "_lang0113_= ^- If the menu is not displayed, the computer has how many hard drives enter the corresponding number"

rem >> [ 02 ] Install Anhdv Boot
set "_lang0201_=^>^> WARNING! ALL DATA ON USB WILL BE LOST!"
set "_lang0202_=^>^> Do you want to continue?? [ Y/N ] = "
set "_lang0203_=^>^> ISO file of Anhdv Boot not found."
set "_lang0204_=^>^> You can download at https://anhdvboot.com"
set "_lang0205_=^>^> You have created an USB Anhdv Boot with a hidden partition."
set "_lang0206_=^ ^  [1]: Update USB BOOT (No data loss on usb)."
set "_lang0207_=^ ^  [2]: Create a new USB BOOT."
set "_lang0208_=^ ^  [4]: Bootloader change"
set "_lang0209_=^ ^  [7]: Delete USB BOOT Anhdv boot, recover the usb storage."
set "_lang0210_=^ ^  [5]: Fix USB BOOT error showing wrong partition"
set "_lang0211_=^>^>  You will choose [ ? ] = "
set "_lang0212_=^>^>  You have created a USB Anhdv Boot before."
set "_lang0213_=^>^>  Do you want to update USB Anhdv Boot? [ Y/N ] = "
set "_lang0214_=^>^>  Copying Anhdv Boot to USB-BOOT partition..."
set "_lang0215_=^ ^  The hard disk you choose is GPT, which only helps you boot UEFI."
set "_lang0216_=^ ^  You created the previous HDD Box Boot."
set "_lang0217_=^ ^  [1]: Update HDD Boot."
set "_lang0218_=^ ^  [2]: Recreate HDD Boot."
set "_lang0219_=^>^> WARNING! ALL data on HDD-BOOT partition will be lost!"
set "_lang0220_=^>^>  Copying Anhdv Boot to HDD-BOOT partition..."
set "_lang0221_=^>^>  USB-BOOT partition has been displayed!"
set "_lang0222_=^ ^  [1]: Copy packages (Bitdefender, DrWeb, Fedora, Kali Linux)"
set "_lang0224_=^ ^  [2]: Hide back to USB-BOOT partition"
set "_lang0225_=^ ^  [3]: Show partition USB-BOOT (Copy packages, edit boot interface)"
set "_lang0226_=^>^>  Copying Packages, Please wait ..."
set "_lang0228_=^>^>  Not enough free storage required!"
set "_lang0229_=^>^>  USB-BOOT partition has 2.8 GB of free space? [ Y/N ] = "
set "_lang0230_=^ ^  [E]: Exit."
set "_lang0231_=^>^>  HDD-BOOT partition has been displayed!"
set "_lang0232_=^ ^  [1]: Copy the Fedora packages to the HDD-BOOT partition"
set "_lang0233_=^ ^  [2]: Copy the Kali Linux packages to the HDD-BOOT partition"
set "_lang0234_=^ ^  [2]: Hide back to HDD-BOOT partition"
set "_lang0235_=^ ^  [3]: Show partition HDD-BOOT (Copy packages, edit boot interface)"
set "_lang0236_=^ ^  [5]: Fix HDD BOOT error showing wrong partition"
set "_lang0239_=^ ^  [6]: Copy the Packages (Windows, Linux, DOS)"
set "_lang0240_=^ ^  [1]: Full update"
set "_lang0241_=^ ^  [2]: Only update fixes"
set "_lang0242_=^ ^  [1]: Create Boot without losing HDD Box data
set "_lang0243_=^ ^  [2]: Delete all HDD Box to create Boot"
set "_lang0244_=^>^> WARNING! ALL DATA ON HDD BOX WILL BE LOST!"

rem >> [ 03 ] Fix Bootloader, MBR, PBR
set "_lang0301_=^>^> Change the bootloader and the MBR:"
set "_lang0302_=^ ^  [1]: Use Grub4dos"
set "_lang0303_=^ ^  [2]: Use GRUB2."
set "_lang0304_=^ ^  [3]: Use MBR Windows NT 6.x"
set "_lang0305_=^ ^  [4]: Use UEFI BOOTMGR (Select when boot UEFI Secure Boot error)."
set "_lang0306_=^ ^  [5]: Use rEFInd (Look for the UEFI system to boot)."
set "_lang0307_=^ ^  [B]: Back."
goto :EOF

:Vietnam
    if "%processor_architecture%"=="x86" (
        "%~dp0SetupGreen32.exe" -i > nul
        "%~dp0LoadDrv_Win32.exe" -i > nul
    ) else (
        "%~dp0SetupGreen64.exe" -i > nul
        "%~dp0LoadDrv_x64.exe" -i > nul
    )

>"%~dp0cfg.ini" (
    echo [Language]
    echo LANGUAGE=lang\vn.txt;42
    echo [CONFIG]
    echo COUNT=7
    echo KEY=AOSR-44393-SREDO-6P055
  	echo [Version]
	echo VERSION=7
	echo [PA]
    echo POPUPMESSAGE=0
    echo CHECKUPDATE=0
)
rem >> Notification
set "_lang0000_=^>^> VUI LONG THAY DOI O DIA X:\ SANG TEN KHAC"
set "_lang0001_=ISO can boot tren phan vung USB-BOOT"
set "_lang0002_=NHAP VAO"
set "_lang0003_=Tat ca     "
set "_lang0004_=Neu dung ISO nao o tren thi nhap them dung luong o cot NHAP VAO"
Set "_lang0005_=Mac dinh dung luong phan vung USB-BOOT"
Set "_lang0006_=^>^> Dang thiet lap Menu boot cho goi cai dat Windows ..."
set "_lang0010_=Nhap them dung luong phan vung BOOT (neu khong bam Enter)"
set "_lang0011_=^>^> Cam on ban da su dung Anhdv Boot ^^_^^"
set "_lang0012_=^>^> Vui long cho trong giay lat..."
set "_lang0013_=^>^> Ngat USB ra va cam lai!"
set "_lang0014_=^>^> Neu USB bi loi hien thi phan vung, nhap Y o duoi de sua loi."
set "_lang0015_=^>^> Ban da ngat USB ra va cam lai chua? Neu chua thi thuc hien ngay nhe!"
set "_lang0016_=^>^> Ban da tao USB BOOT thanh cong!"
set "_lang0017_=ISO can boot tren phan vung HDD-BOOT"
Set "_lang0018_=Mac dinh dung luong phan vung HDD-BOOT"
Set "_lang0019_=^>^> Bam phim bat ky de tiep tuc ..."
set "_lang0020_=^>^> Ban co muon sua loi hien thi sai phan vung cua USB khong? [ Y/N ] = "
set "_lang0021_=^>^> Bam phim bat ky de thoat..."
set "_lang0022_=^!! Neu thuc su can thi moi nhap them, con khong bam Enter de bo qua buoc nay !!"
set "_lang0023_=Nhap dung luong HDD BOOT muon tang them so voi hien tai"
set "_lang0024_=^>^> Ban da tao HDD BOOT thanh cong!"
set "_lang0025_=^>^> Ban co muon sua loi hien thi sai phan vung cua HDD Box khong? [ Y/N ] = "
set "_lang0026_=^>^> Dang sao chep Kaspersky Rescue Disk 18, vui long doi..."
set "_lang0027_=^>^> May tinh ban dang chay"
set "_lang0028_=^>^> Nen USB chi hien duoc 01 phan vung duy nhat." 
set "_lang0029_=^>^> Phan vung USB-BOOT hien len de Anhdv Boot co the boot UEFI tat ca cac may tinh."
set "_lang0030_=^>^> Neu an phan vung USB-BOOT thi mot so may se khong hien USB UEFI."
set "_lang0031_=^>^> Ngat an toan USB/HDD Box, sau do rut ra va cam lai. * Luu Y *: Day la viec bat buoc!"
set "_lang0032_=^>^> Doi den khi may tinh nhan USB / HDD Box thi hay nhap Y [Y/N] = "
set "_lang0033_=^>^> De tao BOOT thanh cong, can doi ten phan vung dau tien cua HDD Box thanh HDD-DATA!"
set "_lang0034_=^>^> Ban da doi ten phan vung dau tien cua HDD Box thanh HDD-DATA chua? [ Y/N ] = "
set "_lang0035_=^>^> Luu y: Khong dong cua so chuong trinh, phai doi den khi hoan thanh"
set "_lang0036_=^>^> Chuong trinh khong the tao BOOT luc nay. Ban can khoi dong lai may va thuc hien lai"
set "_lang0037_=^>^> Phan vung dau tien cua HDD Box chua doi ten thanh HDD-DATA. Doi ten va chay lai 1 click"
set "_lang0038_=^>^> Neu Boot UEFI bi loi, thi thay doi bootloader ve [4] Bootmgr bang cong cu 1 click"
set "_lang0039_=^>^> Neu su dung Goi mo rong (Windows, Linux, Antivirus) thi USB phai du khoang trong can thiet"

rem >> [ 01 ] Install
set "_lang0100_= ^*^*^*^* Luu Y: ^*^*^*^*"
set "_lang0101_=^>^> Nhap so thu tu cua thiet bi muon tao boot"
set "_lang0102_=^>^>CANH BAO: SO THU TU BAN NHAP KHONG PHAI LA THIET BI GAN NGOAI"
set "_lang0103_=^>^> Bam phim bat ky de chon lai..."
set "_lang0104_=^>^> Ban da nhap sai so thu tu thiet bi. Bam phim bat ky de nhap lai"
set "_lang0105_=^>^> Ban co muon tao USB BOOT voi phan vung AN? [ Y/N ] = "
set "_lang0106_=^>^> Neu chon "Y", USB se chia lam 2 phan vung nhu sau:"
set "_lang0107_=^ ^ ^  1. Phan vung USB-BOOT (FAT32) voi Anhdv Boot se an di."
set "_lang0108_=^ ^ ^  2. Phan vung USB-DATA (NTFS) de chua du lieu va Modul khac."
set "_lang0109_=^>^> Neu chon "N", chi phan vung USB-BOOT (FAT32) duoc tao."
set "_lang0110_=^>^>  Dang xoa USB/HDD."
set "_lang0111_=^>^> Day khong phai la USB/HDD Anhdv Boot, ban can tao moi USB/HDD Boot!"
set "_lang0112_= ^- Neu USB khong co trong danh sach, nhap so tiep theo trong cot "Thu tu""
set "_lang0113_= ^- Neu khong hien bang chon, may tinh co bao nhieu O cung nhap so bay nhieu vao"

rem >> [ 02 ] Install Anhdv Boot
set "_lang0201_=^>^> CANH BAO! TAT CA DU LIEU TREN USB SE BI MAT!"
set "_lang0202_=^>^> Ban co muon tiep tuc khong? [ Y/N ] = "
set "_lang0203_=^>^> Khong tim thay file ISO"
set "_lang0204_=^>^> Ban co the download tai https://anhdvboot.com"
set "_lang0205_=^>^> Ban da tao USB Anhdv Boot voi phan vung An."
set "_lang0206_=^ ^  [1]: Cap nhat USB BOOT (khong mat du lieu)."
set "_lang0207_=^ ^  [2]: Tao moi USB BOOT."
set "_lang0208_=^ ^  [4]: Thay doi Bootloader (sua loi boot mot so may)."
set "_lang0210_=^ ^  [5]: Sua loi hien thi sai phan vung cua USB BOOT."
set "_lang0209_=^ ^  [7]: Xoa USB Anhdv Boot, lay lai dung luong USB."
set "_lang0211_=^>^>  Ban se chon [ ? ] = "
set "_lang0212_=^>^>  Ban da tao USB Anhdv Boot."
set "_lang0213_=^>^>  Ban co muon cap nhat USB Anhdv Boot khong? [ Y/N ] = "
set "_lang0214_=^>^>  Dang sao chep Anhdv Boot vao phan vung USB-BOOT..."
set "_lang0215_=^ ^  O cung ban chon la GPT, cong cu chi giup ban boot UEFI."
set "_lang0216_=^ ^  Ban da tao HDD Box Boot truoc do."
set "_lang0217_=^ ^  [1]: Cap nhat HDD Boot."
set "_lang0218_=^ ^  [2]: Tao lai HDD Boot."
set "_lang0227_=^ ^  [3]: Copy goi mo rong fedora, Kali-Linux, DrWeb, Eset ..."
set "_lang0219_=^>^> CANH BAO! TAT CA DU LIEU TREN PHAN VUNG HDD-BOOT SE BI MAT!"
set "_lang0220_=^>^> Dang sao chep Anhdv Boot vao phan vung HDD-BOOT..."
set "_lang0221_=^>^> Phan vung USB-BOOT da hien len!"
set "_lang0222_=^ ^  [1]: Sao chep (Bitdefender, DrWeb, Fedora, Kali Linux, bootra1n)"
set "_lang0224_=^ ^  [2]: An lai phan vung USB-BOOT"
set "_lang0225_=^ ^  [3]: Hien phan vung An USB-BOOT (Copy goi mo rong, sua giao dien)"
set "_lang0226_=^>^>  Dang sao chep goi mo rong, vui long doi den khi xong ..."
set "_lang0228_=^>^>  Khong du dung luong trong can thiet!"
set "_lang0229_=^>^>  Phan vung USB-BOOT co du khoang trong 2.8 GB? [ Y/N ] = "
set "_lang0230_=^ ^  [E]: Exit."
set "_lang0231_=^>^> Phan vung HDD-BOOT da hien len!"
set "_lang0234_=^ ^  [2]: An lai phan vung HDD-BOOT"
set "_lang0235_=^ ^  [3]: Hien phan vung An HDD-BOOT (Copy goi mo rong, sua giao dien)"
set "_lang0236_=^ ^  [5]: Sua loi hien thi sai phan vung HDD BOOT."
set "_lang0239_=^ ^  [6]: Sao chep goi mo rong (Windows, Linux, DOS)"
set "_lang0240_=^ ^  [1]: Cap nhat day du"
set "_lang0241_=^ ^  [2]: Chi cap nhat sua loi"
set "_lang0242_=^ ^  [1]: Tao HDD Boot khong mat du lieu"
set "_lang0243_=^ ^  [2]: Xoa toan bo HDD Box de tao Boot"
set "_lang0244_=^>^> CANH BAO! TAT CA DU LIEU TREN HDD BOX SE BI MAT!"


rem >> [ 03 ] Fix Bootloader, MBR, PBR
set "_lang0301_=^>^> Thay doi Bootloader va nap lai MBR"
set "_lang0302_=^ ^  [1]: Su dung Grub4dos"
set "_lang0303_=^ ^  [2]: Su dung GRUB2."
set "_lang0304_=^ ^  [3]: Su dung MBR Windows NT 6.x."
set "_lang0305_=^ ^  [4]: Su dung UEFI BOOTMGR (Boot tat ca cac may ke ca Secure Boot)."
set "_lang0306_=^ ^  [5]: Su dung rEFInd (Tu tim he thong UEFI de boot)."
set "_lang0307_=^ ^  [B]: Back."

goto :EOF
