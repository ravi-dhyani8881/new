<?php
class DB{
       private $db_name = 'prijalreferal';
    private $db_user = 'prijalreferal';
    private $db_pass = 'Newdelhi@123';
    private $db_host = 'prijalreferal.db.8106546.hostedresource.com';
    function get_db_name() {
        return $this->db_name;
    }

    function get_db_user() {
        return $this->db_user;
    }

    function get_db_pass() {
        return $this->db_pass;
    }

    function get_db_host() {
        return $this->db_host;
    }

    //open a connection to the database. Make sure this is called
    //on every page that needs to use the database.
    public function connect() {
        $connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);

        //	$connection = mysql_connect($this->db_host, $this->db_user);
        mysql_select_db($this->db_name, $connection);

        return true;
    }

    //takes a mysql row set and returns an associative array, where the keys
    //in the array are the column names in the row set. If singleRow is set to
    //true, then it will return a single row instead of an array of rows.
    public function processRowSet($rowSet, $singleRow=false) {
        $resultArray = array();
        while ($row = mysql_fetch_assoc($rowSet)) {
            array_push($resultArray, $row);
        }

        if ($singleRow === true)
            return $resultArray[0];

        return $resultArray;
    }

    //Select rows from the database.
    //returns a full row or rows from $table using $where as the where clause.
    //return value is an associative array with column names as keys.
    public function select($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 1)
            return $this->processRowSet($result, true);

        return $this->processRowSet($result);
    }

    //Inserts a new row into the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table.
    public function insert($data, $table) {

        $columns = "";
        $values = "";

        foreach ($data as $column => $value) {
            $columns .= ($columns == "") ? "" : ", ";
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";
            $values .= $value;
        }

        $sql = "insert into $table ($columns) values ($values)";

        mysql_query($sql) or die(mysql_error());

        //return the ID of the user in the database.
        return mysql_insert_id();
    }

    public function getSpecialtyType() {
        $options = "";
        $sql = "SELECT description FROM rf_spclty_type";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {

            $name = $row["description"];

            $options.="<option value=\"$name\">" . $name . "</option>";
        }
        return "$options";
    }

    public function getList($table, $field_cd, $field_descr, $val) {
        $options = "";

        $sql = "SELECT $field_cd,$field_descr FROM $table";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {

            $cd = $row[$field_cd];
            $name = $row[$field_descr];
            if ($cd == $val)
                $options.="<option value=\"$cd\" selected>" . $name . "</option>";
            else
                $options.="<option value=\"$cd\">" . $name . "</option>";
        }

        return "$options";
    }

    public function getListDescr($table, $field_cd, $field_descr, $val) {
        $options = "";
        $sql = "SELECT $field_cd,$field_descr FROM $table";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {

            $cd = $row[$field_cd];
            $name = $row[$field_descr];
            if ($name == $val)
                $options.="<option value=\"$cd\" selected>" . $name . "</option>";
            else
                $options.="<option value=\"$cd\">" . $name . "</option>";
        }

        return "$options";
    }

    public function getDoctorsList($doctor_account_id, $val) {
        $options = "";
        $sql = "SELECT staff_id,last_name, first_name from org_staff where account_id !='$doctor_account_id'";
        $result = mysql_query($sql);

        while ($row = mysql_fetch_array($result)) {
            $cd = $row['staff_id'];
            $last_name = $row['last_name'];
            $first_name = $row['first_name'];
            if ($cd == $val)
                $options.="<option value=\"$cd\" selected>" . $first_name . ' ' . $last_name . "</option>";
            
            else
                $options.="<option value=\"$cd\">" . $first_name . ' ' . $last_name . "</option>";
        }

        return "$options";
    }

    /* 	public function getPatientsList($doctor_account_id,$val){
      $options="";
      $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
      $result = mysql_query($sql);
      $row = mysql_fetch_assoc($result);
      $staff_id=$row['staff_id'];
      $sql = "SELECT patient_id from doctor_patient where staff_id='$staff_id'";
      $result = mysql_query($sql);
      $row = mysql_fetch_assoc($result);
      $patient_id=$row['patient_id'];
      $sql = "SELECT patient_id, last_name, first_name FROM patient where patient_id='$patient_id'";
      $result = mysql_query($sql);
      while ($row=mysql_fetch_array($result)) {
      $cd=$row['patient_id'];
      $last_name=$row['last_name'];
      $first_name=$row['first_name'];
      if($cd==$val)
      $options.="<option value=\"$cd\" selected>".$first_name.' '.$last_name."</option>";
      else
      $options.="<option value=\"$cd\">".$first_name.' '.$last_name."</option>";
      }

      return "$options";
      }
     */

    public function getPatientsList($doctor_account_id) {
        $options = "";
        $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $staff_id = $row['staff_id'];
        echo $staff_id;
        $sql = "SELECT patient.patient_id, patient.last_name, patient.first_name from doctor_patient join patient on doctor_patient.patient_id=patient.patient_id where doctor_patient.staff_id='$staff_id'";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
            $cd = $row['patient_id'];
            $last_name = $row['last_name'];
            $first_name = $row['first_name'];
            $options.="<option value=\"$cd\">" . $first_name . ' ' . $last_name . "</option>";
        }
        return "$options";
    }

    public function selectPatients($doctor_account_id) {

        $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $staff_id = $row['staff_id'];

        $sql = "SELECT patient.account_id,patient.patient_id,patient.last_name,patient.first_name,
                                                               patient.email_address, patient.work_phone,patient.cell_phone,address.addr_street1,patient.addr_city,
                                                               address.addr_state,address.zip_cd, address.address_id
                                                               FROM patient left outer join address on patient.account_id=address.address_id
                                                               where  patient.patient_id in (SELECT patient_id from doctor_patient where staff_id='$staff_id')";
        $result = mysql_query($sql);

        return $result;
    }

    public function getReferrals($doctor_account_id, $status_cd) {
        $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $staff_id = $row['staff_id'];
        if ($status_cd == 3) {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
						patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
						from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
						left outer join rf_rfrl_status on  dr_patient_refrl.rfrd_status_cd=rf_rfrl_status.rfrl_status_cd
						left outer join org_staff on dr_patient_refrl.staff_id= org_staff.staff_id
						where dr_patient_refrl.rfrd_staff_id='$staff_id' and ( dr_patient_refrl.rfrd_status_cd='$status_cd' || dr_patient_refrl.RFRNG_STATUS_CD=7 ) ");
        } elseif ($status_cd == 1) {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
					patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
					from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
					left outer join rf_rfrl_status on  dr_patient_refrl.rfrng_status_cd=rf_rfrl_status.rfrl_status_cd
					left outer join org_staff on dr_patient_refrl.rfrd_staff_id= org_staff.staff_id
					where dr_patient_refrl.staff_id='$staff_id' and dr_patient_refrl.rfrng_status_cd='$status_cd' ");
        } elseif ($status_cd == 2) {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
					patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
					from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
					left outer join rf_rfrl_status on  dr_patient_refrl.rfrng_status_cd=rf_rfrl_status.rfrl_status_cd
					left outer join org_staff on dr_patient_refrl.rfrd_staff_id= org_staff.staff_id
					where dr_patient_refrl.staff_id='$staff_id' and ( dr_patient_refrl.rfrng_status_cd='$status_cd' || dr_patient_refrl.RFRNG_STATUS_CD=7 )");
        } else {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
					patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
					from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
					left outer join rf_rfrl_status on  dr_patient_refrl.rfrng_status_cd=rf_rfrl_status.rfrl_status_cd
					left outer join org_staff on dr_patient_refrl.rfrd_staff_id= org_staff.staff_id
					where dr_patient_refrl.staff_id='$staff_id' and ( dr_patient_refrl.rfrng_status_cd='$status_cd' || dr_patient_refrl.RFRNG_STATUS_CD=7 )");
        }
        return $result;
    }

    public function getReferralsDrop($doctor_account_id, $status_cd) {
        $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $staff_id = $row['staff_id'];
        if ($status_cd == 3) {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
						patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
						from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
						left outer join rf_rfrl_status on  dr_patient_refrl.rfrd_status_cd=rf_rfrl_status.rfrl_status_cd
						left outer join org_staff on dr_patient_refrl.staff_id= org_staff.staff_id
						where dr_patient_refrl.rfrd_staff_id='$staff_id' and dr_patient_refrl.rfrd_status_cd='$status_cd'");
        } else {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
					patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
					from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
					left outer join rf_rfrl_status on  dr_patient_refrl.rfrng_status_cd=rf_rfrl_status.rfrl_status_cd
					left outer join org_staff on dr_patient_refrl.rfrd_staff_id= org_staff.staff_id
					where dr_patient_refrl.staff_id='$staff_id' and dr_patient_refrl.rfrng_status_cd='$status_cd'");
        }
        return $result;
    }

    public function getReferralsold($doctor_account_id, $status_cd) {
        $sql = "SELECT staff_id from org_staff where account_id='$doctor_account_id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $staff_id = $row['staff_id'];
        if ($status_cd == 3) {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
						patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
						from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
						left outer join rf_rfrl_status on  dr_patient_refrl.rfrd_status_cd=rf_rfrl_status.rfrl_status_cd
						left outer join org_staff on dr_patient_refrl.staff_id= org_staff.staff_id
						where dr_patient_refrl.rfrd_staff_id='$staff_id' and dr_patient_refrl.rfrd_status_cd='$status_cd'");
        } else {
            $result = mysql_query("SELECT dr_patient_refrl.referral_id, dr_patient_refrl.rfrng_date, patient.last_name,patient.first_name,
					patient.GENDER_REPLACE,patient.date_of_birth, rf_rfrl_status.description, org_staff.last_name as ln,org_staff.first_name as fn
					from  dr_patient_refrl left outer join patient on dr_patient_refrl.patient_id=patient.patient_id
					left outer join rf_rfrl_status on  dr_patient_refrl.rfrng_status_cd=rf_rfrl_status.rfrl_status_cd
					left outer join org_staff on dr_patient_refrl.rfrd_staff_id= org_staff.staff_id
					where dr_patient_refrl.staff_id='$staff_id' and dr_patient_refrl.rfrng_status_cd='$status_cd'");
        }
        return $result;
    }
}
?>