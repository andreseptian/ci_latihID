<?php

class UserModel extends CI_Model
{

    public function save()
    {
        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),

        ];

        if ($this->db->insert('users', $data)) {
            return [
                'id'        => $this->db->insert_id(),
                'success'   => true,
                'message'   => 'Penyimpanan data berhasil dilakukan!'
            ];
        }
    }

    public function get($key = null, $value = null)
    {
        if ($key != null) {
            $query = $this->db->get_where('users', array($key => $value));
            return $query->row();
        }


        $query = $this->db->get('users');
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('users')) {
            return [
                'success'   => true,
                'message'   => 'data berhasil dihapus'
            ];
        }
    }

    public function update($id, $data)
    {
        $data = ['nama' => $data->nama];

        $this->db->where('id', $id);
        if ($this->db->update('users', $data)) {
            return [
                'success'   => true,
                'message'   => 'data berhasil diperbarui'
            ];
        }
    }
}
