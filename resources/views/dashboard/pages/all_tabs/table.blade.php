<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        All Tabs Information
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered alltabstable" id="alltabstable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>RSM Area</th>
                    <th>RSM Code</th>
                    <th>RSM Name</th>
                    <th>RSM Mobile</th>
                    <th>ASM Area</th>
                    <th>ASM Code</th>
                    <th>ASM Name</th>
                    <th>ASM Mobile</th>
                    <th>TT</th>
                    <th>TSO Code</th>
                    <th>TSO Name</th>
                    <th>TSO Mobile</th>
                    <th>TSO Alt Mobile</th>
                    <th>SDB CD Code</th>
                    <th>SDB CD Name</th>
                    <th>DB Code</th>
                    <th>DB Name</th>
                    <th>DB Type</th>
                    <th>Ship To Party Name</th>
                    <th>Tab Model</th>
                    <th>Tab Name</th>
                    <th>Tab Serial</th>
                    <th>Tab IMEI</th>
                    <th>SIM No</th>
                    <th>SIM Serial No</th>
                    <th>PIN1</th>
                    <th>PIN2</th>
                    <th>PUK1</th>
                    <th>PUK2</th>
                    <th>SPO Route</th>
                    <th>SPO Code</th>
                    <th>SPO Name</th>
                    <th>SPO NID No</th>
                    <th>SPO Type</th>
                    <th>SPO Mobile</th>
                    <th>SPO Alt Mobile</th>
                    <th>Power Bank</th>
                    <th>Status</th>
                    <th>Knock Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>RSM Area</th>
                    <th>RSM Code</th>
                    <th>RSM Name</th>
                    <th>RSM Mobile</th>
                    <th>ASM Area</th>
                    <th>ASM Code</th>
                    <th>ASM Name</th>
                    <th>ASM Mobile</th>
                    <th>TT</th>
                    <th>TSO Code</th>
                    <th>TSO Name</th>
                    <th>TSO Mobile</th>
                    <th>TSO Alt Mobile</th>
                    <th>SDB CD Code</th>
                    <th>SDB CD Name</th>
                    <th>DB Code</th>
                    <th>DB Name</th>
                    <th>DB Type</th>
                    <th>Ship To Party Name</th>
                    <th>Tab Model</th>
                    <th>Tab Name</th>
                    <th>Tab Serial</th>
                    <th>Tab IMEI</th>
                    <th>SIM No</th>
                    <th>SIM Serial No</th>
                    <th>PIN1</th>
                    <th>PIN2</th>
                    <th>PUK1</th>
                    <th>PUK2</th>
                    <th>SPO Route</th>
                    <th>SPO Code</th>
                    <th>SPO Name</th>
                    <th>SPO NID No</th>
                    <th>SPO Type</th>
                    <th>SPO Mobile</th>
                    <th>SPO Alt Mobile</th>
                    <th>Power Bank</th>
                    <th>Status</th>
                    <th>Knock Status</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($tabs as $tab)
                <tr>
                    <td>{{ $tab->rsm_area }}</td>
                    <td>{{ $tab->rsm_code }}</td>
                    <td>{{ $tab->rsm_name }}</td>
                    <td>0{{ $tab->rsm_mobile }}</td>
                    <td>{{ $tab->asm_area }}</td>
                    <td>{{ $tab->asm_code }}</td>
                    <td>{{ $tab->asm_name }}</td>
                    <td>0{{ $tab->asm_mobile }}</td>
                    <td>{{ $tab->tt }}</td>
                    <td>{{ $tab->tso_code }}</td>
                    <td>{{ $tab->tso_name }}</td>
                    <td>0{{ $tab->tso_mobile }}</td>
                    <td>0{{ $tab->tso_alt_mobile }}</td>
                    <td>{{ $tab->sdb_cd_code }}</td>
                    <td>{{ $tab->sdb_cd_name }}</td>
                    <td>{{ $tab->db_code }}</td>
                    <td>{{ $tab->db_name }}</td>
                    <td>{{ $tab->db_name }}</td>
                    <td>{{ $tab->ship_to_party_name }}</td>
                    <td>{{ $tab->tab_model }}</td>
                    <td>{{ $tab->tab_name }}</td>
                    <td>{{ $tab->tab_serial }}</td>
                    <td>{{ $tab->tab_imei }}</td>
                    <td>{{ $tab->sim_no }}</td>
                    <td>{{ $tab->sim_serial_no }}</td>
                    <td>{{ $tab->pin1 }}</td>
                    <td>{{ $tab->pin2 }}</td>
                    <td>{{ $tab->puk1 }}</td>
                    <td>{{ $tab->puk2 }}</td>
                    <td>{{ $tab->spo_route }}</td>
                    <td>{{ $tab->spo_code }}</td>
                    <td>{{ $tab->spo_name }}</td>
                    <td>{{ $tab->spo_nid_no }}</td>
                    <td>{{ $tab->spo_type }}</td>
                    <td>0{{ $tab->spo_mobile }}</td>
                    <td>0{{ $tab->spo_alt_mobile }}</td>
                    <td>{{ $tab->power_bank_serial_no }}</td>
                    <td>{{ $tab->status }}</td>
                    <td>{{ $tab->knox_status }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
