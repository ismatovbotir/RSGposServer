<section class="section" id="section-orders">

    <div class="page-header">
        <h1 class="page-title">Orders</h1>
        <button class="btn btn-primary">+ New order</button>
    </div>

    <div class="filter-row">
        <select>
            <option>All statuses</option>
            <option>new</option>
            <option>fiscal</option>
            <option>completed</option>
            <option>cancelled</option>
        </select>
        <select>
            <option>All sources</option>
            <option>POS</option>
            <option>Mobile</option>
            <option>Wolt</option>
        </select>
        <input type="text" placeholder="Search by code or UUID...">
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>UUID</th>
                    <th>Code</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Fiscal URL</th>
                    <th>Status</th>
                    <th>Source</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-mono">3fa85f64...</td>
                    <td class="td-strong">#0034</td>
                    <td>4</td>
                    <td>87,200</td>
                    <td class="td-link">receipt.uz/f/abc123</td>
                    <td><span class="pill pill-fiscal">fiscal</span></td>
                    <td>POS</td>
                    <td class="td-muted">10:42</td>
                </tr>
                <tr>
                    <td class="td-mono">7c2a1b9e...</td>
                    <td class="td-strong">#0033</td>
                    <td>2</td>
                    <td>34,000</td>
                    <td class="td-link">receipt.uz/f/xyz789</td>
                    <td><span class="pill pill-done">completed</span></td>
                    <td>Wolt</td>
                    <td class="td-muted">10:15</td>
                </tr>
                <tr>
                    <td class="td-mono">a1d3f820...</td>
                    <td class="td-strong">#0032</td>
                    <td>7</td>
                    <td>156,500</td>
                    <td class="td-link">receipt.uz/f/def456</td>
                    <td><span class="pill pill-done">completed</span></td>
                    <td>POS</td>
                    <td class="td-muted">09:58</td>
                </tr>
                <tr>
                    <td class="td-mono">f9c02e71...</td>
                    <td class="td-strong">#0031</td>
                    <td>1</td>
                    <td>18,900</td>
                    <td class="td-muted">—</td>
                    <td><span class="pill pill-new">new</span></td>
                    <td>Mobile</td>
                    <td class="td-muted">09:31</td>
                </tr>
                <tr>
                    <td class="td-mono">c3d55a12...</td>
                    <td class="td-strong">#W-0021</td>
                    <td>5</td>
                    <td>224,000</td>
                    <td class="td-link">receipt.uz/f/wlt001</td>
                    <td><span class="pill pill-wolt">wolt</span></td>
                    <td>Wolt</td>
                    <td class="td-muted">08:44</td>
                </tr>
            </tbody>
        </table>
    </div>

</section>
