@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_sm3" /DISABLE
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Report_sm3" /DISABLE
Pause