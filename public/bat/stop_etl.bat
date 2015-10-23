@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_etl"
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Report_etl"
Pause