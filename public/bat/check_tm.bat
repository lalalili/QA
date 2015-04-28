@ECHO OFF
CLS
echo Checking 10.0.6.206 Schedule ....
SCHTASKS /Query /FO TABLE /S 10.0.6.206 /U administrator /P admin156* |findstr /i "_"
Pause