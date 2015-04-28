@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_migodemo" /ENABLE
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Report_migodemo" /ENABLE
Pause