<?php

class Pengajuan_model extends CI_Model
{
    public function getPengajuan()
    {
        $query = "SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
                  JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` != 'Selesai' ORDER BY `waktu_pengajuan` ASC
                ";
        return $this->db->query($query)->result_array();
    }
    public function getPengajuanSelesai()
    {
        $query = "SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
                  JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` = 'Selesai' ORDER BY `waktu_pengajuan` ASC
                ";
        return $this->db->query($query)->result_array();
    }
    public function getKontak()
    {
        $query = "SELECT * FROM `pegawai` WHERE `id_pegawai` != 1 ";
        return $this->db->query($query)->result_array();
    }
}
