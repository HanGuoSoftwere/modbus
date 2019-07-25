将vendor/hanguosoft/modbus/config目录下的modbus.php 文件复制到项目config目录下并配置好
 * FC 1: read coils                         readCoils($unitId = 0 ,$reference = 12288 ,$quantity = 12) 读取线圈
 * FC 2: read input discretes               readInputDiscretes($unitId = 0 ,$reference = 12288 ,$quantity = 2)   读取输入分立器件
 * FC 3: read multiple registers            readMultipleRegisters($unitId = 0 ,$reference = 10000 ,$quantity = 6)   读取多个寄存器
 * FC 4: read multiple input registers      readMultipleInputRegisters($unitId = 0 ,$reference = 0 ,$quantity = 2)  读取多个输入寄存器
 * FC 5: write single coil                  writeSingleCoil($unitId = 0 ,$reference = 0 ,$data = array(TRUE))       写入单个线圈
 * FC 6: write single register              writeSingleRegister($unitId = 0,$reference = 10000,$data = array(-1000) ,$dataTypes =array("REAL"))  读取单个寄存器
 * FC 15: write multiple coils              writeMultipleCoils($unitId = 0,$reference = 12288,$data)  写入多个线圈
 * FC 16: write multiple registers          writeMultipleRegister($unitId = 0,$reference = 12288,$data , $dataTypes)   写入 多个寄存器
 * FC 23: read write registers              readWriteRegisters($unitId = 0,$referenceRead = 12288,$quantity,$referenceWrite,$data , $dataTypes)   读写 寄存器



