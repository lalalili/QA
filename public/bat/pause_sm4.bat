@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.207 /U administrator /P admin156* /TN "Auto_sm4" /DISABLE
SCHTASKS /Change /S 10.0.6.207 /U administrator /P admin156* /TN "Report_sm4" /DISABLE
Pause