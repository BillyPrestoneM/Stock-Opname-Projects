<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opname extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Opname_model');
    }

    ////////////////////////
    //  TABEL Stokopname  //
    ////////////////////////
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['opname'] = $this->Opname_model->get_stokopname()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/v_opname', $data);
        $this->load->view('templates/footer');
    }

    public function add_stokopname()
    {
        $data['item'] = $this->Opname_model->get_itemmaster()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/add_stock_opname', $data);
        $this->load->view('templates/footer');
    }

    public function save_stokopname()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $Tanggal = $this->input->post('Tanggal');
        $Keterangan = $this->input->post('Keterangan');
        $EnteredBy = $this->input->post('EnteredBy');
        $KodeItem = $this->input->post('KodeItem');
        $BatchNumber = $this->input->post('BatchNumber');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $RealStock = $this->input->post('RealStock');
        $this->Opname_model->save_stockopname($NoTransaksi, $Tanggal, $Keterangan, $EnteredBy, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock);
        $this->load->view('opname/add_stock_opname');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been added
            </div>');
        redirect('Opname');
    }

    public function get_edit_stokopname()
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_stokopname_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'Tanggal' => $i['Tanggal'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            $this->load->view('templates/header');
            $this->load->view('opname/edit_opname', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_stokopname()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $Tanggal = $this->input->post('Tanggal');
        $Keterangan = $this->input->post('Keterangan');
        $EnteredBy = $this->input->post('EnteredBy');
        $this->Opname_model->update_stokopname($NoTransaksi, $Tanggal, $Keterangan, $EnteredBy);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('Opname');
    }

    public function get_delete_stokopname()
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_stokopname_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'Tanggal' => $i['Tanggal'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            return $data;
        }
    }

    function delete_stokopname()
    {
        $NoTransaksi = $this->uri->segment(3);
        $this->Opname_model->delete_stokopname($NoTransaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data deleted successfully
            </div>');
        redirect('opname');
    }


    /////////////////////////////////
    //  TABEL  Stockopnamedetail  //
    ////////////////////////////////

    public function stockopnamedetail()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['opname'] = $this->Opname_model->get_stockopnamedetail()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/v_detail_opname', $data);
        $this->load->view('templates/footer');
    }

    public function add_stockopnamedetail()
    {
        $data['item'] = $this->Opname_model->get_itemmaster()->result();
        $data['stokopname'] = $this->Opname_model->get_stokopname()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/add_stockopnamedetail', $data);
        $this->load->view('templates/footer');
    }

    function save_stockopnamedetail()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $KodeItem = $this->input->post('KodeItem');
        $BatchNumber = $this->input->post('BatchNumber');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $RealStock = $this->input->post('RealStock');
        $EnteredBy = $this->input->post('EnteredBy');
        $EnteredDate = $this->input->post('EnteredDate');
        $this->Opname_model->save_stockopnamedetail($NoTransaksi, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock, $EnteredBy, $EnteredDate);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been added
            </div>');
        redirect('Opname/stockopnamedetail');
    }

    public function get_edit_stockopnamedetail()
    {

        $NoLine = $this->uri->segment(3);
        $result = $this->Opname_model->get_stockopnamedetail_key($NoLine);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoLine' => $i['NoLine'],
                'NoTransaksi' => $i['NoTransaksi'],
                'KodeItem' => $i['KodeItem'],
                'BatchNumber' => $i['BatchNumber'],
                'ExpiredDate' => $i['ExpiredDate'],
                'RealStock' => $i['RealStock'],
                'EnteredBy' => $i['EnteredBy'],
                'EnteredDate' => $i['EnteredDate'],
            );
            $data['stokopname'] = $this->Opname_model->get_stokopname()->result();
            $data['item'] = $this->Opname_model->get_itemmaster()->result();
            $this->load->view('templates/header');
            $this->load->view('opname/edit_detail_opname', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_stockopnamedetail()
    {
        $NoLine = $this->input->post('NoLine');
        $NoTransaksi = $this->input->post('NoTransaksi');
        $KodeItem = $this->input->post('KodeItem');
        $BatchNumber = $this->input->post('BatchNumber');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $RealStock = $this->input->post('RealStock');
        $EnteredBy = $this->input->post('EnteredBy');
        $EnteredDate = $this->input->post('EnteredDate');
        $this->Opname_model->update_stockopnamedetail($NoLine, $NoTransaksi, $KodeItem, $BatchNumber, $ExpiredDate, $RealStock, $EnteredBy, $EnteredDate);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('Opname/stockopnamedetail');
    }

    public function get_delete_stockopnamedetail()
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_stockopnamedetail_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'KodeItem' => $i['KodeItem'],
                'BatchNumber' => $i['BatchNumber'],
                'ExpiredDate' => $i['ExpiredDate'],
                'RealStock' => $i['RealStock'],
                'EnteredBy' => $i['EnteredBy'],
                'EnteredDate' => $i['EnteredDate'],
            );
            return $data;
        }
    }

    function delete_stockopnamedetail()
    {
        $NoTransaksi = $this->uri->segment(3);
        $this->Opname_model->delete_stockopnamedetail($NoTransaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data deleted successfully
            </div>');
        redirect('opname');
    }

    ////////////////////////////////////
    //  TABEL Itemqtytransaksiheader  //
    ////////////////////////////////////

    public function itemqtytransaksiheader()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['opname'] = $this->Opname_model->get_itemqtytransaksiheader()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/v_transaksi_opname', $data);
        $this->load->view('templates/footer');
    }

    public function add_itemqtytransaksiheader()
    {
        $data['item'] = $this->Opname_model->get_itemmaster()->result();
        $data['stokopname'] = $this->Opname_model->get_stokopname()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/add_transaksi_opname', $data);
        $this->load->view('templates/footer');
    }

    function save_itemqtytransaksiheader()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $TglTransaksi = $this->input->post('TglTransaksi');
        $TipeTransaksi = $this->input->post('TipeTransaksi');
        $Keterangan = $this->input->post('Keterangan');
        $EnteredBy = $this->input->post('EnteredBy');
        $ItemId = $this->input->post('ItemId');
        $Qty = $this->input->post('Qty');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $BatchNumber = $this->input->post('BatchNumber');
        $ItemQtyLocation_Balance = $this->input->post('ItemQtyLocation_Balance');
        $this->Opname_model->save_itemqtytransaksiheader($NoTransaksi, $TglTransaksi, $TipeTransaksi, $Keterangan, $EnteredBy, $ItemId, $Qty, $ExpiredDate, $BatchNumber, $ItemQtyLocation_Balance);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been added
            </div>');
        redirect('Opname/itemqtytransaksiheader');
    }

    public function get_edit_itemqtytransaksiheader()
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemqtytransaksiheader_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'TglTransaksi' => $i['TglTransaksi'],
                'TipeTransaksi' => $i['TipeTransaksi'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            $this->load->view('templates/header');
            $this->load->view('opname/edit_transaksi_header', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_itemqtytransaksiheader()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $TglTransaksi = $this->input->post('TglTransaksi');
        $TipeTransaksi = $this->input->post('TipeTransaksi');
        $Keterangan = $this->input->post('Keterangan');
        $EnteredBy = $this->input->post('EnteredBy');
        $this->Opname_model->update_itemqtytransaksiheader($NoTransaksi, $TglTransaksi, $TipeTransaksi, $Keterangan, $EnteredBy);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('Opname/itemqtytransaksiheader');
    }

    public function get_delete_itemqtytransaksiheader()
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemqtytransaksiheader_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'TglTransaksi' => $i['TglTransaksi'],
                'TipeTransaksi' => $i['TipeTransaksi'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            return $data;
        }
    }

    function delete_itemqtytransaksiheader()
    {
        $NoTransaksi = $this->uri->segment(3);
        $this->Opname_model->delete_itemqtytransaksiheader($NoTransaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data deleted successfully
            </div>');
        redirect('opname/itemqtytransaksiheader');
    }


    ///////////////////////////////
    //  TABEL Itemqtytransaksi  //
    //////////////////////////////

    public function itemqtytransaksi()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['opname'] = $this->Opname_model->get_itemqtytransaksi()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/v_transaksi_qty', $data);
        $this->load->view('templates/footer');
    }

    public function add_itemqtytransaksi()
    {
        $data['item'] = $this->Opname_model->get_itemmaster()->result();
        $data['stokopname'] = $this->Opname_model->get_itemqtytransaksiheader()->result();
        $this->load->view('templates/header');
        $this->load->view('opname/add_transaksi_qty', $data);
        $this->load->view('templates/footer');
    }

    function save_itemqtytransaksi()
    {
        $NoTransaksi = $this->input->post('NoTransaksi');
        $ItemId = $this->input->post('ItemId');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $BatchNumber = $this->input->post('BatchNumber');
        $Qty = $this->input->post('Qty');
        $ItemQtyLocation_Balance = $this->input->post('ItemQtyLocation_Balance');
        $this->Opname_model->save_itemqtytransaksi($NoTransaksi, $ItemId, $ExpiredDate, $BatchNumber, $Qty, $ItemQtyLocation_Balance);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been added
            </div>');
        redirect('Opname/itemqtytransaksi');
    }

    public function get_edit_itemqtytransaksi()
    {
        $TransaksiId = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemqtytransaksi_key($TransaksiId);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'TransaksiId' => $i['TransaksiId'],
                'NoTransaksi' => $i['NoTransaksi'],
                'ItemId' => $i['ItemId'],
                'Qty' => $i['Qty'],
                'ExpiredDate' => $i['ExpiredDate'],
                'BatchNumber' => $i['BatchNumber'],
                'ItemQtyLocation_Balance' => $i['ItemQtyLocation_Balance']
            );
            $data['item'] = $this->Opname_model->get_itemmaster()->result();
            $data['stokopname'] = $this->Opname_model->get_itemqtytransaksiheader()->result();
            $this->load->view('templates/header');
            $this->load->view('opname/edit_transaksi_qty', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_itemqtytransaksi()
    {
        $TransaksiId = $this->input->post('TransaksiId');
        $NoTransaksi = $this->input->post('NoTransaksi');
        $ItemId = $this->input->post('ItemId');
        $Qty = $this->input->post('Qty');
        $ExpiredDate = $this->input->post('ExpiredDate');
        $BatchNumber = $this->input->post('BatchNumber');
        $ItemQtyLocation_Balance = $this->input->post('ItemQtyLocation_Balance');
        $this->Opname_model->update_itemqtytransaksi($TransaksiId, $NoTransaksi, $ItemId, $Qty, $ExpiredDate, $BatchNumber, $ItemQtyLocation_Balance);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('Opname/itemqtytransaksi');
    }

    public function get_delete_itemqtytransaksi()
    {
        $TransaksiId = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemqtytransaksi_key($TransaksiId);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'TransaksiId' => $i['TransaksiId'],
                'NoTransaksi' => $i['NoTransaksi'],
                'ItemId' => $i['ItemId'],
                'Qty' => $i['Qty'],
                'ExpiredDate' => $i['ExpiredDate'],
                'BatchNumber' => $i['BatchNumber'],
                'ItemQtyLocation_Balance' => $i['ItemQtyLocation_Balance']
            );
            return $data;
        }
    }

    function delete_itemqtytransaksi()
    {
        $TransaksiId = $this->uri->segment(3);
        $this->Opname_model->delete_itemqtytransaksi($TransaksiId);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data deleted successfully
            </div>');
        redirect('opname/itemqtytransaksi');
    }

    /////////////////////////
    //  TABEL ITEM MASTER  //
    /////////////////////////

    public function item_master($row_no = 0)
    {
        // Row per page
        $row_per_page = 5;
        // Row position
        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Style pagination
        $config = $this->style_pagination();

        // Pagination Configuration
        // All records count
        $config['total_rows'] = $this->Opname_model->get_itemmaster_count();
        $config['base_url'] = base_url() . 'index.php/opname/item_master/';
        $config['use_page_numbers'] = TRUE;
        $config['per_page'] = $row_per_page;
        // Initialize
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $row_no;

        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['opname'] = $this->Opname_model->get_itemmasters($row_no, $row_per_page);
        $this->load->view('templates/header');
        $this->load->view('opname/v_item_master', $data);
        $this->load->view('templates/footer');
    }

    public function add_item_master()
    {
        $this->load->view('templates/header');
        $this->load->view('opname/add_item_master');
        $this->load->view('templates/footer');
    }

    function save_item_master()
    {
        $KodeItem = $this->input->post('KodeItem');
        $NamaItem = $this->input->post('NamaItem');
        $SatuanStok = $this->input->post('SatuanStok');
        $IsActive = $this->input->post('IsActive');
        $this->Opname_model->save_itemmaster($KodeItem, $NamaItem, $SatuanStok, $IsActive);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been added
            </div>');
        redirect('Opname/item_master');
    }

    public function get_edit_item_master()
    {
        $KodeItem = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemmaster_key($KodeItem);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'KodeItem' => $i['KodeItem'],
                'NamaItem' => $i['NamaItem'],
                'SatuanStok' => $i['SatuanStok'],
                'IsActive' => $i['IsActive']
            );
            $this->load->view('templates/header');
            $this->load->view('opname/edit_item_master', $data);
            $this->load->view('templates/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_item_master()
    {
        $KodeItem = $this->input->post('KodeItem');
        $NamaItem = $this->input->post('NamaItem');
        $SatuanStok = $this->input->post('SatuanStok');
        $IsActive = $this->input->post('IsActive');
        $this->Opname_model->update_itemmaster($KodeItem, $NamaItem, $SatuanStok, $IsActive);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('Opname/item_master');
    }


    ////////////////////////
    //////  DETAIL  ////////
    ////////////////////////

    public function get_detail_opname($NoTransaksi)
    {

        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_stokopname_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'Tanggal' => $i['Tanggal'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            $data['detail'] = $this->Opname_model->get_detail_stokopname($NoTransaksi)->result();
            $this->load->view('templates/header');
            $this->load->view('opname/detail_opname', $data);
            $this->load->view('templates/footer');
        }
    }

    public function get_detail_itemqtytransaksiheader($NoTransaksi)
    {
        $NoTransaksi = $this->uri->segment(3);
        $result = $this->Opname_model->get_itemqtytransaksiheader_key($NoTransaksi);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'NoTransaksi' => $i['NoTransaksi'],
                'TglTransaksi' => $i['TglTransaksi'],
                'TipeTransaksi' => $i['TipeTransaksi'],
                'Keterangan' => $i['Keterangan'],
                'EnteredBy' => $i['EnteredBy']
            );
            $data['detail'] = $this->Opname_model->get_detail_itemqtytransaksiheader($NoTransaksi)->result();
            $this->load->view('templates/header');
            $this->load->view('opname/detail_transaksi_opname', $data);
            $this->load->view('templates/footer');
        }
    }


    /////////////////////////
    ///  STYLE PAGINATION ///
    /////////////////////////

    public function style_pagination()
    {
        // boostrap class and styles
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        return $config;
    }
}
