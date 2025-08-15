<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reports_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_total_orders()
    {
        return $this->db->count_all_results('order_table');
    }

    public function get_orders_with_users($limit, $offset)
    {
        $this->db->select('order_table.*, user_table.user_id as user_id, user_table.fname,user_table.lname, user_table.country');
        $this->db->from('order_table');
        $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');
        $this->db->order_by('order_table.order_id', 'DESC');
        $this->db->limit($limit, $offset); // Apply limit and offset for pagination
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_total_order_amount($filter_type = null, $search_term = null, $from_date = null, $to_date = null, $country = null)
    {
        $this->db->select_sum('payment_table.amount');
        $this->db->from('order_table');
        $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');
        $this->db->join('payment_table', 'payment_table.order_id = order_table.order_id');
        $this->db->where('payment_table.status', 'COMPLETED');

        $this->_apply_order_filters($filter_type, $search_term, $from_date, $to_date, $country);

        $query = $this->db->get();
        $result = $query->row_array();

        return $result['amount'] ?? 0;
    }

    // private function _apply_order_filters($filter_type, $search_term, $specific_date, $country) // Changed from start_date, end_date
    // {
    //     switch ($filter_type) {
    //         case 'international':
    //             $this->db->where('user_table.country !=', 'India');
    //             break;
    //         case 'national':
    //             $this->db->where('user_table.country', 'India');
    //             break;
    //         case 'delivered':
    //             $this->db->where('order_table.status', 4);
    //             break;
    //         case 'pending':
    //             $this->db->where('order_table.status', 1);
    //             break;
    //         case 'cancelled':
    //             $this->db->where('order_table.status', 0);
    //             break;
    //         case 'shipped':
    //             $this->db->where('order_table.status', 2);
    //             break;
    //         case 'all':
    //         default:
    //             // No specific filter needed for 'all'
    //             break;
    //     }

    //     if (!empty($search_term)) {
    //         $this->db->group_start();
    //         $this->db->like('order_table.order_id', $search_term);
    //         $this->db->or_like('user_table.fname', $search_term);
    //         $this->db->or_like('user_table.lname', $search_term);
    //         $this->db->or_like('user_table.country', $search_term);
    //         $this->db->or_like('order_table.product_id', $search_term);
    //         $this->db->group_end();
    //     }

    //     // This is the key change:
    //     if (!empty($specific_date)) {
    //         $this->db->where('DATE(order_table.created_at)', $specific_date);
    //     }
    // }
    private function _apply_order_filters($filter_type = null, $search_term = null, $from_date = null, $to_date = null, $country = null)
    {
        switch ($filter_type) {
            case 'international':
                $this->db->where('user_table.country !=', 'India');
                break;
            case 'national':
                $this->db->where('user_table.country', 'India');
                break;
            case 'delivered':
                $this->db->where('order_table.status', 4);
                break;
            case 'pending':
                $this->db->where('order_table.status', 1);
                break;
            case 'cancelled':
                $this->db->where('order_table.status', 0);
                break;
            case 'shipped':
                $this->db->where('order_table.status', 2);
                break;
            case 'all':
            default:
                // No specific filter
                break;
        }

        if (!empty($search_term)) {
            $this->db->group_start();
            $this->db->like('order_table.order_id', $search_term);
            $this->db->or_like('user_table.fname', $search_term);
            $this->db->or_like('user_table.lname', $search_term);
            $this->db->or_like('user_table.country', $search_term);
            $this->db->or_like('order_table.product_id', $search_term);
            $this->db->group_end();
        }

        // ✅ Apply date range filters
        if (!empty($from_date)) {
            $this->db->where('DATE(order_table.created_at) >=', $from_date);
        }
        if (!empty($to_date)) {
            $this->db->where('DATE(order_table.created_at) <=', $to_date);
        }

        // ✅ Optional: if country is explicitly passed as a separate filter
        if (!empty($country)) {
            $this->db->where('user_table.country', $country);
        }
    }

    // public function get_total_filtered_orders($filter_type = null, $search_term = null, $specific_date = null, $country = null)
    // {
    //     $this->db->from('order_table');
    //     $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');
    //     $this->_apply_order_filters($filter_type, $search_term, $specific_date, $country);
    //     return $this->db->count_all_results();
    // }

    // public function get_filtered_orders($filter_type = null, $search_term = null, $specific_date = null, $country = null, $limit = null, $offset = null)
    // {
    //     $this->db->select('order_table.*, user_table.user_id as user_id, user_table.fname,user_table.lname, user_table.country');
    //     $this->db->from('order_table');
    //     $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');

    //     $this->_apply_order_filters($filter_type, $search_term, $specific_date, $country);

    //     $this->db->order_by('order_table.order_id', 'DESC');
    //     if ($limit !== null && $offset !== null) {
    //         $this->db->limit($limit, $offset); // Apply limit and offset for pagination
    //     }
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function get_filtered_orders($filter_type = null, $search_term = null, $from_date = null, $to_date = null, $country = null, $limit = null, $offset = null)
    {
        $this->db->select('order_table.*, user_table.user_id as user_id, user_table.fname, user_table.lname, user_table.country');
        $this->db->from('order_table');
        $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');
        $this->db->join('payment_table', 'payment_table.order_id = order_table.order_id');
        $this->db->where('payment_table.status', 'COMPLETED');

        $this->_apply_order_filters($filter_type, $search_term, $from_date, $to_date, $country);

        $this->db->group_by('order_table.order_id'); // prevent duplicates

        $this->db->order_by('order_table.order_id', 'DESC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_total_filtered_orders($filter_type = null, $search_term = null, $from_date = null, $to_date = null, $country = null)
    {
        // Build main query first
        $this->db->select('order_table.order_id');
        $this->db->from('order_table');
        $this->db->join('user_table', 'user_table.user_id = order_table.user_id', 'left');
        $this->db->join('payment_table', 'payment_table.order_id = order_table.order_id');
        $this->db->where('payment_table.status', 'COMPLETED');

        $this->_apply_order_filters($filter_type, $search_term, $from_date, $to_date, $country);
        $this->db->group_by('order_table.order_id');

        // Get the compiled SQL string
        $sql = $this->db->get_compiled_select();

        // Wrap in a COUNT(*) query
        $count_query = $this->db->query("SELECT COUNT(*) as total FROM ({$sql}) AS sub");
        return (int) $count_query->row()->total;
    }


    public function count_all_payments()
    {
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');
        return $this->db->count_all_results();
    }

    public function fetch_payment_details_data($limit, $start)
    {
        $this->db->select('payment_table.*, user_table.fname, user_table.lname, user_table.country');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_total_filtered_payments($filter, $search, $from_date, $to_date)
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');

        // Filter by country
        if ($filter === 'national') {
            $this->db->where('user_table.country', 'India');
        } elseif ($filter === 'international') {
            $this->db->where('user_table.country !=', 'India');
        }

        // Apply search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('user_table.fname', $search);
            $this->db->or_like('user_table.lname', $search);
            $this->db->or_like('payment_table.payment_id', $search);
            $this->db->or_like('payment_table.payment_mode', $search);
            $this->db->or_like('user_table.country', $search);
            if (is_numeric($search)) {
                $this->db->or_like('payment_table.amount', $search);
            }
            $this->db->group_end();
        }

        // Date filter
        if (!empty($from_date)) {
            $this->db->where('DATE(payment_table.date) >=', $from_date);
        }
        if (!empty($to_date)) {
            $this->db->where('DATE(payment_table.date) <=', $to_date);
        }

        return $this->db->get()->row()->count;
    }

    public function get_filtered_payments($filter, $search, $from_date, $to_date, $limit, $offset)
    {
        $this->db->select('payment_table.*, user_table.fname, user_table.lname, user_table.country');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');

        // Filter by country
        if ($filter === 'national') {
            $this->db->where('user_table.country', 'India');
        } elseif ($filter === 'international') {
            $this->db->where('user_table.country !=', 'India');
        }

        // Search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('user_table.fname', $search);
            $this->db->or_like('user_table.lname', $search);
            $this->db->or_like('payment_table.payment_id', $search);
            $this->db->or_like('payment_table.payment_mode', $search);
            $this->db->or_like('user_table.country', $search);
            if (is_numeric($search)) {
                $this->db->or_like('payment_table.amount', $search);
            }
            $this->db->group_end();
        }

        // Date filter
        if (!empty($from_date)) {
            $this->db->where('DATE(payment_table.date) >=', $from_date);
        }
        if (!empty($to_date)) {
            $this->db->where('DATE(payment_table.date) <=', $to_date);
        }

        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    public function get_total_payment_amount($filter, $search, $from_date, $to_date)
    {
        $this->db->select_sum('payment_table.amount');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');

        // Filter by country
        if ($filter === 'national') {
            $this->db->where('user_table.country', 'India');
        } elseif ($filter === 'international') {
            $this->db->where('user_table.country !=', 'India');
        }

        // Search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('user_table.fname', $search);
            $this->db->or_like('user_table.lname', $search);
            $this->db->or_like('payment_table.payment_id', $search);
            $this->db->or_like('payment_table.payment_mode', $search);
            $this->db->or_like('user_table.country', $search);
            if (is_numeric($search)) {
                $this->db->or_like('payment_table.amount', $search);
            }
            $this->db->group_end();
        }

        // Date filter
        if (!empty($from_date)) {
            $this->db->where('DATE(payment_table.date) >=', $from_date);
        }
        if (!empty($to_date)) {
            $this->db->where('DATE(payment_table.date) <=', $to_date);
        }

        $result = $this->db->get()->row();
        return $result->amount ?? 0;
    }


    public function get_all_filtered_payments($filter, $search, $from_date = null, $to_date = null)
    {
        $this->db->select('
        payment_table.amount,
        payment_table.date,
        payment_table.status,
        payment_table.payment_mode, 
        user_table.fname,
        user_table.lname,
        user_table.country
            ');
        $this->db->from('payment_table');
        $this->db->join('user_table', 'payment_table.user_id = user_table.user_id');

        // Country filter
        if ($filter == 'national') {
            $this->db->where('user_table.country', 'India');
        } elseif ($filter == 'international') {
            $this->db->where('user_table.country !=', 'India');
        }

        // Search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('user_table.fname', $search);
            $this->db->or_like('user_table.lname', $search);
            $this->db->or_like('payment_table.payment_id', $search);
            $this->db->or_like('payment_table.payment_mode', $search);
            $this->db->or_like('user_table.country', $search);
            if (is_numeric($search)) {
                $this->db->or_like('payment_table.amount', $search);
            }
            $this->db->group_end();
        }

        // Date filter
        if (!empty($from_date)) {
            $this->db->where('DATE(payment_table.date) >=', $from_date);
        }
        if (!empty($to_date)) {
            $this->db->where('DATE(payment_table.date) <=', $to_date);
        }

        return $this->db->get()->result();
    }




    public function get_all_sales_details()
    {
        $this->db->select('
        u.fname,
        u.lname,
        u.country,
        u.mobile,
        p.amount,
        p.date,
        p.status as payment_status
                        ');
        $this->db->from('payment_table p');
        $this->db->join('user_table u', 'u.user_id = p.user_id', 'left');
        $this->db->order_by('p.date', 'DESC');

        return $this->db->get()->result();
    }
    // public function get_filtered_sales($filter_type, $search_term, $specific_date, $limit, $offset)
    // {
    //     date_default_timezone_set('Asia/Kolkata'); // Ensure timezone

    //     $this->db->select('u.fname, u.lname, u.country, u.mobile, p.amount, p.date, p.status as payment_status');
    //     $this->db->from('payment_table p');
    //     $this->db->join('user_table u', 'u.user_id = p.user_id', 'left');

    //     // Filter by type
    //     if ($filter_type === 'national') {
    //         $this->db->where('u.country', 'India');
    //     } elseif ($filter_type === 'international') {
    //         $this->db->where('u.country !=', 'India');
    //     } elseif ($filter_type === 'daily') {
    //         $this->db->where('DATE(p.date)', date('Y-m-d'));
    //     } elseif ($filter_type === 'monthly') {
    //         $this->db->where('MONTH(p.date)', date('m'));
    //         $this->db->where('YEAR(p.date)', date('Y'));
    //     }

    //     // Specific date filter (overrides others if provided)
    //     if (!empty($specific_date)) {
    //         $this->db->where('DATE(p.date)', $specific_date); // Safe for DATETIME/DATE
    //     }

    //     // Search
    //     if (!empty($search_term)) {
    //         $this->db->group_start();
    //         $this->db->like('u.fname', $search_term);
    //         $this->db->or_like('u.lname', $search_term);
    //         $this->db->or_like('u.mobile', $search_term);
    //         $this->db->or_like('u.country', $search_term);
    //         $this->db->group_end();
    //     }

    //     // Clone for total_amount
    //     $amount_query = clone $this->db;

    //     // Total count
    //     $total = $this->db->count_all_results('', false);

    //     // Get paginated results
    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();
    //     $sales = $query->result();

    //     // Total amount
    //     $amount_query->select_sum('p.amount');
    //     $amount_row = $amount_query->get()->row();
    //     $total_amount = isset($amount_row->amount) && is_numeric($amount_row->amount)
    //         ? round((float)$amount_row->amount)
    //         : 0;

    //     return [
    //         'sales' => $sales,
    //         'total' => $total,
    //         'total_amount' => $total_amount
    //     ];
    // }
    public function get_filtered_sales($filter_type, $search_term, $from_date, $to_date, $limit, $offset)
    {
        date_default_timezone_set('Asia/Kolkata');

        $this->db->select('u.fname, u.lname, u.country, u.mobile, p.amount, p.date, p.status as payment_status');
        $this->db->from('payment_table p');
        $this->db->join('user_table u', 'u.user_id = p.user_id', 'left');

        // Filter by country type
        if ($filter_type === 'national') {
            $this->db->where('u.country', 'India');
        } elseif ($filter_type === 'international') {
            $this->db->where('u.country !=', 'India');
        } elseif ($filter_type === 'daily') {
            $this->db->where('DATE(p.date)', date('Y-m-d'));
        } elseif ($filter_type === 'monthly') {
            $this->db->where('MONTH(p.date)', date('m'));
            $this->db->where('YEAR(p.date)', date('Y'));
        }

        // Date range filter
        if (!empty($from_date)) {
            $this->db->where('DATE(p.date) >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('DATE(p.date) <=', $to_date);
        }

        // Search filter
        if (!empty($search_term)) {
            $this->db->group_start();
            $this->db->like('u.fname', $search_term);
            $this->db->or_like('u.lname', $search_term);
            $this->db->or_like('u.mobile', $search_term);
            $this->db->or_like('u.country', $search_term);
            $this->db->group_end();
        }

        // Clone for total amount
        $amount_query = clone $this->db;

        // Total count
        $total = $this->db->count_all_results('', false);

        // Paginate result
        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        $sales = $query->result();

        // Total amount
        $amount_query->select_sum('p.amount');
        $amount_row = $amount_query->get()->row();
        $total_amount = isset($amount_row->amount) && is_numeric($amount_row->amount)
            ? round((float)$amount_row->amount)
            : 0;

        return [
            'sales' => $sales,
            'total' => $total,
            'total_amount' => $total_amount
        ];
    }

    public function fetch_all_user_details()
    {
        $this->db->select('*');
        $this->db->from('user_table');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    // public function get_filtered_users($filter, $search, $date, $limit, $offset)
    // {
    //     $this->db->from('user_table');

    //     if ($filter == 'national') {
    //         $this->db->where('country', 'India');
    //     } elseif ($filter == 'international') {
    //         $this->db->where('country !=', 'India');
    //     } elseif ($filter == 'new') {
    //         $this->db->where('created_at >=', date('Y-m-d', strtotime('-30 days')));
    //     }

    //     if (!empty($search)) {
    //         $this->db->group_start();
    //         $this->db->like('fname', $search);
    //         $this->db->or_like('lname', $search);
    //         $this->db->or_like('email', $search);
    //         $this->db->or_like('mobile', $search);
    //         $this->db->group_end();
    //     }

    //     if (!empty($date)) {
    //         $this->db->where('DATE(created_at)', $date);
    //     }

    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_filtered_users($filter, $search, $from_date, $to_date, $limit, $offset)
    {
        $this->db->from('user_table');

        // Filter by type
        if ($filter === 'national') {
            $this->db->where('country', 'India');
        } elseif ($filter === 'international') {
            $this->db->where('country !=', 'India');
        } elseif ($filter === 'new') {
            $this->db->where('created_at >=', date('Y-m-d H:i:s', strtotime('-30 days')));
        }

        // Search
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('mobile', $search);
            $this->db->group_end();
        }

        // ✅ Clean date filter
        if (!empty($from_date)) {
            $this->db->where('created_at >=', $from_date . ' 00:00:00');
        }
        if (!empty($to_date)) {
            $this->db->where('created_at <=', $to_date . ' 23:59:59');
        }

        $this->db->limit($limit, $offset);
        $this->db->order_by('created_at', 'DESC');

        return $this->db->get()->result();
    }



    public function get_user_address_by_id($user_id, $limit, $offset)
    {
        return $this->db->where('user_id', $user_id)
            ->limit($limit, $offset)
            ->get('user_address')
            ->result_array();
    }
    public function get_user_address_count($user_id)
    {
        return $this->db->where('user_id', $user_id)
            ->from('user_address')
            ->count_all_results();
    }
    // public function count_filtered_users($filter, $search, $date)
    // {
    //     $this->db->from('user_table');

    //     if ($filter == 'national') {
    //         $this->db->where('country', 'India');
    //     } elseif ($filter == 'international') {
    //         $this->db->where('country !=', 'India');
    //     } elseif ($filter == 'new') {
    //         $this->db->where('created_at >=', date('Y-m-d', strtotime('-30 days')));
    //     }

    //     if (!empty($search)) {
    //         $this->db->group_start();
    //         $this->db->like('fname', $search);
    //         $this->db->or_like('lname', $search);
    //         $this->db->or_like('email', $search);
    //         $this->db->or_like('mobile', $search);
    //         $this->db->group_end();
    //     }

    //     if (!empty($date)) {
    //         $this->db->where('DATE(created_at)', $date);
    //     }

    //     return $this->db->count_all_results();
    // }
    public function count_filtered_users($filter, $search, $from_date, $to_date)
    {
        $this->db->from('user_table');

        // Filter type
        if ($filter == 'national') {
            $this->db->where('country', 'India');
        } elseif ($filter == 'international') {
            $this->db->where('country !=', 'India');
        } elseif ($filter == 'new') {
            $this->db->where('created_at >=', date('Y-m-d', strtotime('-30 days')));
        }

        // Search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('mobile', $search);
            $this->db->group_end();
        }

        // Date range filter
        if (!empty($from_date)) {
            $this->db->where('DATE(created_at) >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('DATE(created_at) <=', $to_date);
        }

        return $this->db->count_all_results();
    }

    public function get_user_stats()
    {
        $now = date('Y-m-d');
        $last_30_days = date('Y-m-d', strtotime('-30 days'));

        // Total users
        $this->db->select('COUNT(*) AS total_users');
        $total = $this->db->get('user_table')->row()->total_users;

        // Users from India
        $this->db->select('COUNT(*) AS india_users');
        $this->db->where('country', 'India');
        $india = $this->db->get('user_table')->row()->india_users;

        // Users outside India
        $this->db->select('COUNT(*) AS foreign_users');
        $this->db->where('country !=', 'India');
        $foreign = $this->db->get('user_table')->row()->foreign_users;

        $this->db->select('COUNT(*) AS new_users');
        $this->db->where('created_at >=', $last_30_days); // Update 'created_at' if different
        $new = $this->db->get('user_table')->row()->new_users;

        return [
            'total_users'   => $total,
            'india_users'   => $india,
            'foreign_users' => $foreign,
            'new_users'     => $new
        ];
    }
    // public function get_filtered_users2($filter_type, $search_term, $specific_date)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user_table');

    //     if ($filter_type == 'national') {
    //         $this->db->where('country', 'India');
    //     } elseif ($filter_type == 'international') {
    //         $this->db->where('country !=', 'India');
    //     } elseif ($filter_type == 'new') {
    //         $date_30_days_ago = date('Y-m-d', strtotime('-30 days'));
    //         $this->db->where('created_at >=', $date_30_days_ago);
    //     }

    //     if (!empty($search_term)) {
    //         $this->db->group_start();
    //         $this->db->like('fname', $search_term);
    //         $this->db->or_like('lname', $search_term);
    //         $this->db->or_like('email', $search_term);
    //         $this->db->or_like('mobile', $search_term);
    //         $this->db->or_like('user_id', $search_term);
    //         $this->db->group_end();
    //     }

    //     if (!empty($specific_date)) {
    //         $this->db->where('DATE(created_at)', $specific_date);
    //     }

    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     }

    //     return [];
    // }
    public function get_filtered_users2($filter_type, $search_term, $from_date, $to_date)
    {
        $this->db->select('*');
        $this->db->from('user_table');

        // Filter by type
        if ($filter_type == 'national') {
            $this->db->where('country', 'India');
        } elseif ($filter_type == 'international') {
            $this->db->where('country !=', 'India');
        } elseif ($filter_type == 'new') {
            $date_30_days_ago = date('Y-m-d', strtotime('-30 days'));
            $this->db->where('created_at >=', $date_30_days_ago);
        }

        // Search filters
        if (!empty($search_term)) {
            $this->db->group_start();
            $this->db->like('fname', $search_term);
            $this->db->or_like('lname', $search_term);
            $this->db->or_like('email', $search_term);
            $this->db->or_like('mobile', $search_term);
            $this->db->or_like('user_id', $search_term);
            $this->db->group_end();
        }

        // From - To date range filter
        if (!empty($from_date)) {
            $this->db->where('DATE(created_at) >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('DATE(created_at) <=', $to_date);
        }

        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : [];
    }
}
