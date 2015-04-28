@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_tm2" /DISABLE
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Report_tm2" /DISABLE
Pause