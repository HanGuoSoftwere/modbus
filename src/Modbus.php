<?php
/**
 * Created by PhpStorm.
 * User: 71060
 * Date: 2019/7/25
 * Time: 9:53
 */

namespace Hanguosoft\Modbus;


/**
 * Class Modbus
 * @package Hanguosoft\Modbus
 * FC 1: read coils
 * FC 2: read input discretes
 * FC 3: read multiple registers
 * FC 4: read multiple input registers
 * FC 5: write single coil
 * FC 6: write single register
 * FC 15: write multiple coils
 * FC 16: write multiple registers
 * FC 23: read write registers
 *
 * type fc1 (type $unitId, type $reference, type $quantity)
 *  type fc2 (type $unitId, type $reference, type $quantity)
 * false|Array fc3 (int $unitId, int $reference, int $quantity)
 * false|Array fc4 (int $unitId, int $reference, int $quantity)
 * bool fc5 (int $unitId, int $reference, array $data, array $dataTypes)
 * bool fc6 (int $unitId, int $reference, array $data, array $dataTypes)
 * bool fc15 (int $unitId, int $reference, array $data)
 * bool fc16 (int $unitId, int $reference, array $data, array $dataTypes)
 * false|Array fc23 (int $unitId, int $referenceRead, int $quantity, int $referenceWrite, array $data, array $dataTypes)
 * void readCoils (type $unitId, type $reference, type $quantity)
 * void readInputDiscretes (type $unitId, type $reference, type $quantity)
 * false|Array readMultipleInputRegisters (int $unitId, int $reference, int $quantity)
 * false|Array readMultipleRegisters (int $unitId, int $reference, int $quantity)
 * false|Array readWriteRegisters (int $unitId, int $referenceRead, int $quantity, int $referenceWrite, array $data, array $dataTypes)
 * type writeMultipleCoils (type $unitId, type $reference, type $data)
 * bool writeMultipleRegister (int $unitId, int $reference, array $data, array $dataTypes)
 * bool writeSingleCoil (int $unitId, int $reference, array $data)
 * bool writeSingleRegister (int $unitId, int $reference, array $data, array $dataTypes)
 * void __toString ()
 */
class Modbus
{
    protected $modbus = '';
    protected $host = '';
    protected  $type = '';
    public function __construct()
    {
        $this->host= config('modbus.default.host');
        $this->type= config('modbus.default.type');
        $this->modbus =  new ModbusMasterTcp($this->host,$this->type);
    }

    /**
     * FC1
     * 读取线圈
     * @param int $unitId
     * @param int $reference
     * @param int $quantity
     * @return mixed
     */
    public function readCoils($unitId = 0 ,$reference = 12288 ,$quantity = 12){
        try {
            $recData = $this->modbus->readCoils($unitId, $reference, $quantity);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC2
     * 读取输入分立器件
     * @param int $unitId
     * @param int $reference
     * @param int $quantity
     * @return mixed
     */
    public function readInputDiscretes($unitId = 0 ,$reference = 12288 ,$quantity = 2){
        try {
            // read 2 input bits from address 0x0 (Wago input image)
            $recData = $this->modbus->readInputDiscretes($unitId, $reference, $quantity);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }

    }

    /**
     * fc3
     * 读取多个寄存器
     * @param int $unitId
     * @param int $reference
     * @param int $quantity
     * @return mixed
     */
    public  function  readMultipleRegisters($unitId = 0 ,$reference = 10000 ,$quantity = 6){
        try {
            $recData = $this->modbus->readMultipleRegisters($unitId, $reference, $quantity);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC4
     * 读取多个输入寄存器
     * @param int $unitId
     * @param int $reference
     * @param int $quantity
     * @return mixed
     */
    public function readMultipleInputRegisters($unitId = 0 ,$reference = 0 ,$quantity = 2){
        try {
            // Read input discretes - FC 4
            $recData = $this->modbus->readMultipleInputRegisters($unitId, $reference, $quantity);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC5
     * 写入单个线圈
     * @param int $unitId
     * @param int $reference
     * @param array $data
     */
    public function writeSingleCoil($unitId = 0 ,$reference = 0 ,$data = array(TRUE)){
//        $data_true = array(TRUE);
//        $data_false = array(FALSE);
        try {
            // Write single coil - FC5
            $recData = $this->modbus->writeSingleCoil($unitId, $reference, $data);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC6
     * 读取单个寄存器
     * @param int $unitId
     * @param int $reference
     * @param array $data
     * @param array $dataTypes
     * @return mixed
     */
    public function writeSingleRegister($unitId = 0,$reference = 10000,$data = array(-1000) ,$dataTypes =array("REAL")){
//        $data = array(-1000);
//        $dataTypes = array("REAL");
        try {
            $recData = $this->modbus->writeSingleRegister($unitId, $reference, $data, $dataTypes);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC15
     * 写入多个线圈
     * @param int $unitId
     * @param int $reference
     * @param $data
     * @return mixed
     */
    public function writeMultipleCoils($unitId = 0,$reference = 12288,$data){
//        $data = array(TRUE, FALSE, TRUE, TRUE, FALSE, TRUE, TRUE, TRUE,
//            TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE,
//            FALSE, FALSE, FALSE, FALSE, TRUE, TRUE, TRUE, TRUE,
//            TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE);
        try {
            // FC15
            $recData = $this->modbus->writeMultipleCoils($unitId, $reference, $data);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC16
     * 写入多个寄存器
     * @param int $unitId
     * @param int $reference
     * @param $data
     * @param $dataTypes
     * @return mixed
     */
    public function writeMultipleRegister($unitId = 0,$reference = 12288,$data , $dataTypes){
        // Data to be writen
//        $data = array(10, -1000, 2000, 3.0);
//        $dataTypes = array("WORD", "INT", "DINT", "REAL");
        try {
            $recData =  $this->modbus->writeMultipleRegister($unitId, $reference, $data, $dataTypes);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
    }

    /**
     * FC23
     * 读写寄存器
     * @param int $unitId
     * @param int $referenceRead
     * @param $quantity
     * @param $referenceWrite
     * @param $data
     * @param $dataTypes
     * @return mixed
     */
    public function readWriteRegisters($unitId = 0,$referenceRead = 12288,$quantity,$referenceWrite,$data , $dataTypes){
        // Data to be writen
        //        $data = array(10, -1000, 2000, 3.0);
        //        $dataTypes = array("WORD", "INT", "DINT", "REAL");

        try {
            // FC23
            $recData = $this->modbus->readWriteRegisters($unitId, $referenceRead, $quantity, $referenceWrite, $data, $dataTypes);
            return $recData;
        }
        catch (Exception $e) {
            // Print error information if any
            echo $this->modbus;
            echo $e;
            exit;
        }
        // Print status information
        echo "</br>Status:</br>" . $this->modbus;
        // Print read data
        echo "</br>Data:</br>";
    }






}