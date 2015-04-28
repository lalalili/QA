@ECHO OFF
CLS
echo Checking 10.0.6.207 Schedule ....
SCHTASKS /Query /FO TABLE /S 10.0.6.207 /U administrator /P admin156* |findstr /i "_"
Pause