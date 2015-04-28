@ECHO OFF
CLS
echo Checking 10.0.6.219 Schedule ....
SCHTASKS /Query /FO TABLE /S 10.0.6.219 /U administrator /P admin156* |findstr /i "_"
Pause