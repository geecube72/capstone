<?php
 
	class reports_model extends CI_Model{

	public function getAgeBracket($status){
		$sql_str = "
			SELECT 
				   SUM(CASE WHEN `age` BETWEEN 60 AND 69 AND `status` = '$status' THEN 1 ELSE 0 END) AS data1,
				   SUM(CASE WHEN `age` BETWEEN 70 AND 79 AND `status` = '$status' THEN 1 ELSE 0 END) AS data2,
				   SUM(CASE WHEN `age` BETWEEN 80 AND 89 AND `status` = '$status' THEN 1 ELSE 0 END) AS data3,
				   SUM(CASE WHEN `age` BETWEEN 90 AND 99 AND `status` = '$status' THEN 1 ELSE 0 END) AS data4,
				   SUM(CASE WHEN `age` BETWEEN 100 AND `age` > 100 AND `status` = '$status' THEN 1 ELSE 0 END) AS data5
			FROM `senior_citizens`
		";
		return $this->db->query($sql_str);
	}

	public function getComplaintReport($choices){
		$sql_str = "
			SELECT COUNT(`complaint_no`) as complainCount
			FROM `complaints`
			WHERE `complaint_type` = '{$choices}'
		";
		return $this->db->query($sql_str);
	}

	public function getBirthMonth($month,$status){
		$sql_str = "
			SELECT COUNT(`SC_no`) as birthCount
			FROM `senior_citizens`
			WHERE `status` = '$status'
			AND MONTHNAME(`date_of_birth`) = '{$month}'
		";
		return $this->db->query($sql_str);
	}

	public function getNewRegisteredSC($month,$year,$barangay_no,$status){
		$sql_str = "
			SELECT COUNT(`SC_no`) as registrantCount
			FROM `senior_citizens`
			WHERE MONTHNAME(`date_registered`) = '{$month}'
			AND DATE_FORMAT(`date_registered`,'%Y') = '{$year}'
			AND `barangay_no` = '{$barangay_no}'
			AND `status` = '{$status}'
		";
		return $this->db->query($sql_str);
	}

	public function getAllowanceMonth($month,$year,$barangay_no){
		$sql_str = "
			SELECT COUNT(`SC_no`) as allowanceCount
			FROM `allowancetrackerview`
			WHERE MONTHNAME(`date_given`) = '{$month}'
			AND DATE_FORMAT(`date_given`,'%Y') = '{$year}'
			AND `barangay_no` = '{$barangay_no}' 
		";
		return $this->db->query($sql_str);
	}

	public function getDeathMonth($month,$status,$year,$barangay_no){
		$sql_str = "
			SELECT COUNT(`SC_no`) as deathCount
			FROM `senior_citizens`
			WHERE `status` = '$status'
			AND MONTHNAME(`date_of_death`) = '{$month}'
			AND DATE_FORMAT(`date_of_death`,'%Y') = '{$year}'
			AND `barangay_no` = '{$barangay_no}'
		";
		return $this->db->query($sql_str);
	}

	}
?>