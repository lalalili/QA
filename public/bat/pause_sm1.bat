@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.207 /U administrator /P admin156* /TN "Auto_sm1" /DISABLE
SCHTASKS /Change /S 10.0.6.207 /U administrator /P admin156* /TN "Report_sm1" /DISABLE
Pause