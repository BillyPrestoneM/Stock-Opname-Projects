<?php

class Opname_model extends CI_Model
{
    //////////////////////
    //////  Detail  //////
    /////////////////////
    function get_detail_stokopname($NoTransaksi)
    {
        $this->db->select('*');
        $this->db->from('stockopnamedetail');
        $this->db->where('NoTransaksi', $NoTransaksi);
        $query = $this->db->get();
        return $query;
    }

    function get_detail_itemqtytransaksiheader($NoTransaksi)
    {
        $this->db->select('*');
        $this->db->from('itemqtytransaksi');
        $this->db->where('NoTransaksi', $NoTransaksi);
        $query = $this->db->get();
        return $query;
    }


    //////////////////////
    ////  JOIN TABEL  ////
    /////////////////////

    // Add Data
    // Tabel stokopname & stockopnamedetail
    function save_stockopname($NoTransaksi, $Tanggal, $Keterangan, $EnteredBy, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock)
    {
        // Tabel stokopname
        $datastokopname = array(
            'NoTransaksi ' => $NoTransaksi,
            'Tanggal' => $Tanggal,
            'Keterangan' => $Keterangan,
            'EnteredBy' => $EnteredBy
        );
        $this->db->insert('stokopname', $datastokopname);

        // Tabel stockopnamedetail
        $dataopnamedetail = array(
            'NoTransaksi' => $NoTransaksi,
            'KodeItem' => $KodeItem,
            'BatchNumber' => $BatchNumber,
            'ExpiredDate' => $ExpiredDate,
            'RealStock' => $RealStock,
            'EnteredBy' => $EnteredBy,
            'EnteredDate' => $Tanggal,
        );
        $this->db->insert('stockopnamedetail', $dataopnamedetail);
    }

    // Tabel itemqtytransaksiheader dan itemqtytransaksi
    function save_itemqtytransaksiheader($NoTransaksi, $TglTransaksi, $TipeTransaksi, $Keterangan, $EnteredBy, $ItemId, $Qty, $ExpiredDate, $BatchNumber, $ItemQtyLocation_Balance)
    {
        // Tabel itemqtytransaksiheader
        $dataqtyheader = array(
            'NoTransaksi ' => $NoTransaksi,
            'TglTransaksi' => $TglTransaksi,
            'TipeTransaksi' => $TipeTransaksi,
            'Keterangan' => $Keterangan,
            'EnteredBy' => $EnteredBy
        );
        $this->db->insert('itemqtytransaksiheader', $dataqtyheader);

        // Tabel itemqtytransaksi
        $dataqty = array(
            'NoTransaksi' => $NoTransaksi,
            'ItemId' => $ItemId,
            'Qty' => $Qty,
            'ExpiredDate' => $ExpiredDate,
            'BatchNumber' => $BatchNumber,
            'ItemQtyLocation_Balance' => $ItemQtyLocation_Balance
        );
        $this->db->insert('itemqtytransaksi', $dataqty);
    }


    ////////////////////////
    //  TABEL Stokopname //
    ///////////////////////
    function get_stokopname()
    {
        $this->db->select('*');
        $this->db->from('stokopname');
        $result = $this->db->get();
        return $result;
    }

    function get_stokopname_key($NoTransaksi)
    {
        $query = $this->db->get_where('stokopname', array('NoTransaksi' => $NoTransaksi));
        return $query;
    }

    // edit data
    function update_stokopname($NoTransaksi, $Tanggal, $Keterangan, $EnteredBy)
    {
        $datastokopname = array(
            'Tanggal' => $Tanggal,
            'Keterangan' => $Keterangan,
            'EnteredBy' => $EnteredBy
        );
        $this->db->where('NoTransaksi', $NoTransaksi);
        $this->db->update('stokopname', $datastokopname);
    }

    function delete_stokopname($NoTransaksi)
    {
        $this->db->where('NoTransaksi', $NoTransaksi);
        $this->db->delete('stokopname');
    }


    ///////////////////////////////
    //  TABEL Stockopnamedetail  //
    ///////////////////////////////

    function get_stockopnamedetail()
    {
        $this->db->select('*');
        $this->db->from('stockopnamedetail');
        $result = $this->db->get();
        return $result;
    }

    function get_stockopnamedetail_key($NoLine)
    {
        $query = $this->db->get_where('stockopnamedetail', array('NoLine' => $NoLine));
        return $query;
    }

    function save_stockopnamedetail($NoTransaksi, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock, $EnteredBy, $EnteredDate)
    {
        $datastockopnamedetail = array(
            'NoTransaksi' => $NoTransaksi,
            'KodeItem' => $KodeItem,
            'BatchNumber' => $BatchNumber,
            'ExpiredDate' => $ExpiredDate,
            'RealStock' => $RealStock,
            'EnteredBy' => $EnteredBy,
            'EnteredDate' => $EnteredDate
        );
        $this->db->insert('stockopnamedetail', $datastockopnamedetail);
    }

    function update_stockopnamedetail($NoLine, $NoTransaksi, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock, $EnteredBy, $EnteredDate)
    {
        $datastokopname = array(
            'NoTransaksi' => $NoTransaksi,
            'KodeItem' => $KodeItem,
            'BatchNumber' => $BatchNumber,
            'ExpiredDate' => $ExpiredDate,
            'RealStock' => $RealStock,
            'EnteredBy' => $EnteredBy,
            'EnteredDate' => $EnteredDate
        );
        $this->db->where('NoLine', $NoLine);
        $this->db->update('stockopnamedetail', $datastokopname);
    }

    function delete_stockopnamedetail($NoTransaksi)
    {
        $this->db->where('NoTransaksi', $NoTransaksi);
        $this->db->delete('stockopnamedetail');
    }


    ////////////////////////////////////
    //  TABEL itemqtytransaksiheader  //
    ////////////////////////////////////
    function get_itemqtytransaksiheader_key($NoTransaksi)
    {
        $query = $this->db->get_where('itemqtytransaksiheader', array('NoTransaksi' => $NoTransaksi));
        return $query;
    }

    function get_itemqtytransaksiheader()
    {
        $this->db->select('*');
        $this->db->from('itemqtytransaksiheader');
        $result = $this->db->get();
        return $result;
    }

    function update_itemqtytransaksiheader($NoTransaksi, $TglTransaksi, $TipeTransaksi, $Keterangan, $EnteredBy)
    {
        $dataitemqtytransaksiheader = array(
            'TglTransaksi' => $TglTransaksi,
            'TipeTransaksi' => $TipeTransaksi,
            'Keterangan' => $Keterangan,
            'EnteredBy' => $EnteredBy
        );
        $this->db->where('NoTransaksi', $NoTransaksi);
        $this->db->update('itemqtytransaksiheader', $dataitemqtytransaksiheader);
    }

    function delete_itemqtytransaksiheader($NoTransaksi)
    {
        $this->db->where('NoTransaksi', $NoTransaksi);
        $this->db->delete('itemqtytransaksiheader');
    }



    ///////////////////////////////
    //  TABEL itemqtytransaksi  //
    ///////////////////////////////
    function get_itemqtytransaksi()
    {
        $this->db->select('*');
        $this->db->from('itemqtytransaksi');
        $result = $this->db->get();
        return $result;
    }

    function get_itemqtytransaksi_key($TransaksiId)
    {
        $query = $this->db->get_where('itemqtytransaksi', array('TransaksiId' => $TransaksiId));
        return $query;
    }

    function save_itemqtytransaksi($NoTransaksi, $ItemId, $ExpiredDate, $BatchNumber, $Qty, $ItemQtyLocation_Balance)
    {
        $dataitemqtytransaksi = array(
            'NoTransaksi' => $NoTransaksi,
            'ItemId' => $ItemId,
            'ExpiredDate' => $ExpiredDate,
            'BatchNumber' => $BatchNumber,
            'Qty' => $Qty,
            'ItemQtyLocation_Balance' => $ItemQtyLocation_Balance
        );
        $this->db->insert('itemqtytransaksi', $dataitemqtytransaksi);
    }

    function update_itemqtytransaksi($TransaksiId, $NoTransaksi, $ItemId, $Qty, $ExpiredDate, $BatchNumber, $ItemQtyLocation_Balance)
    {
        $dataitemqtytransaksi = array(
            'NoTransaksi' => $NoTransaksi,
            'ItemId' => $ItemId,
            'Qty' => $Qty,
            'ExpiredDate' => $ExpiredDate,
            'BatchNumber' => $BatchNumber,
            'ItemQtyLocation_Balance' => $ItemQtyLocation_Balance
        );
        $this->db->where('TransaksiId ', $TransaksiId);
        $this->db->update('itemqtytransaksi', $dataitemqtytransaksi);
    }

    function delete_itemqtytransaksi($TransaksiId)
    {
        $this->db->where('TransaksiId', $TransaksiId);
        $this->db->delete('itemqtytransaksi');
    }


    /////////////////////////
    //  TABEL ITEM MASTER  //
    /////////////////////////

    // get data
    function get_itemmaster()
    {
        $this->db->select('*');
        $this->db->from('itemmaster');
        $result = $this->db->get();
        return $result;
    }

    function get_itemmasters($rowno, $rowperpage)
    {
        $this->db->select('*');
        $this->db->from('itemmaster');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    function get_itemmaster_key($KodeItem)
    {
        $query = $this->db->get_where('itemmaster', array('KodeItem' => $KodeItem));
        return $query;
    }

    function get_itemmaster_count()
    {
        $this->db->select('*');
        $this->db->from('itemmaster');
        $result = $this->db->count_all_results();
        return $result;
    }

    // add data
    function save_itemmaster($KodeItem, $NamaItem, $SatuanStok, $IsActive)
    {
        $dataitemmaster = array(
            'KodeItem' => $KodeItem,
            'NamaItem' => $NamaItem,
            'SatuanStok' => $SatuanStok,
            'IsActive' => $IsActive
        );
        $this->db->insert('itemmaster', $dataitemmaster);
    }

    // edit data
    function update_itemmaster($KodeItem, $NamaItem, $SatuanStok, $IsActive)
    {
        $dataitemmaster = array(
            'NamaItem' => $NamaItem,
            'SatuanStok' => $SatuanStok,
            'IsActive' => $IsActive
        );
        $this->db->where('KodeItem', $KodeItem);
        $this->db->update('itemmaster', $dataitemmaster);
    }

    // delete data
    function delete_itemmaster($KodeItem)
    {
        $this->db->where('KodeItem', $KodeItem);
        $this->db->delete('itemmaster');
    }
}
