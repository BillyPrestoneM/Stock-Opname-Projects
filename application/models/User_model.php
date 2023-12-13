<?php

class User_model extends CI_Model
{
    // semua data
    function all_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('person', 'user.PersonKey = person.PersonKey');
        $result = $this->db->get();
        return $result;
    }

    // data person
    function allperson()
    {
        $this->db->select('*');
        $this->db->from('person');
        $result = $this->db->get();
        return $result;
    }

    // detail person
    function get_person()
    {
        $this->db->select('*');
        $this->db->from('person');
        $result = $this->db->get();
        return $result;
    }

    // data user
    function alluser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $result = $this->db->get();
        return $result;
    }

    function save($Email, $Password, $Nama, $DateofBirth, $PlaceofBirth, $HomeAddress, $WorkAddress)
    {
        $datauser = array(
            'Email' => $Email,
            'Password' => $Password
        );
        $this->db->insert('user', $datauser);
        $dataperson = array(
            'Nama' => $Nama,
            'DateofBirth' => $DateofBirth,
            'PlaceofBirth' => $PlaceofBirth,
            'HomeAddress' => $HomeAddress,
            'WorkAddress' => $WorkAddress,
        );
        $this->db->insert('person', $dataperson);
    }

    // update person
    function update($PersonKey, $Email, $Password, $Nama, $DateofBirth, $PlaceofBirth, $HomeAddress, $WorkAddress)
    {
        $dataperson = array(
            'Nama' => $Nama,
            'DateofBirth' => $DateofBirth,
            'PlaceofBirth' => $PlaceofBirth,
            'HomeAddress' => $HomeAddress,
            'WorkAddress' => $WorkAddress
        );
        $this->db->where('PersonKey', $PersonKey);
        $this->db->update('person', $dataperson);

        $datauser = array(
            'Email' => $Email,
            'Password' => $Password
        );
        $this->db->where('PersonKey', $PersonKey);
        $this->db->update('user', $datauser);
    }

    // get PersonKey key
    function get_person_key($PersonKey)
    {
        $query = $this->db->get_where('person', array('PersonKey' => $PersonKey));
        return $query;
    }

    // get Email key
    function get_email($PersonKey)
    {
        $query = $this->db->get_where('user', array('PersonKey' => $PersonKey));
        return $query;
    }

    function delete($PersonKey)
    {
        $this->db->where('PersonKey', $PersonKey);
        $this->db->delete('user');

        $this->db->where('PersonKey', $PersonKey);
        $this->db->delete('person');
    }
}
