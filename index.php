<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora de Dosagem</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark text-white">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <p class="h1">Calculadora de Buffers</p>
                <small class="text-muted">Calcule a dosagem de Seachem Acid Buffer e do Seachem Alkaline Buffer para os parâmetros desejados de água.</small>
            </div>
        </div>
        <form>
            <hr />
            <div class="row mt-3">
                <div class="col">
                    <strong class="mb-3">Parâmetros atuais da àgua</strong>
                    <div class="mb-3">
                        <label for="volume" class="form-label">Volume (litros)</label>
                        <input type="text" class="form-control" id="volume" placeholder="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="phAtual" class="form-label">PH</label>
                        <input type="text" class="form-control" id="phAtual" placeholder="7" required>
                    </div>
                    <div class="mb-3">
                        <label for="khAtual" class="form-label">KH</label>
                        <input type="text" class="form-control" id="khAtual" placeholder="0" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong class="mb-3">Parâmetros desejados da àgua</strong>
                    <div class="mb-3">
                        <label for="phDesejado" class="form-label">PH</label>
                        <select class="form-select" id="phDesejado" aria-label="PH Desejado">
                            <option value="1.3">6,5</option>
                            <option value="2" selected>7,0</option>
                            <option value="2.5">7,5</option>
                            <option value="4">8,0</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="khDesejado" class="form-label">KH</label>
                        <input type="text" class="form-control" id="khDesejado" placeholder="0" required onchange="calcular()">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong class="mb-3">Dosagem</strong>
                    <div class="mb-3">
                        <label for="alkaline" class="form-label">Seachem Alkaline Buffer (g)</label>
                        <input type="text" class="form-control" id="alkaline" placeholder="0" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="acid" class="form-label">Seachem Acid Buffer (g)</label>
                        <input type="text" class="form-control" id="acid" placeholder="0" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" onclick="calcular()">Calcular</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function calcular(){
            var baseVolume = 80;
            var baseDose = 6;
            var baseKh = 2.8;

            var volume = parseFloat( document.getElementById('volume').value );
            var khAtual = parseFloat( document.getElementById('khAtual').value );
            var phAtual = parseFloat( document.getElementById('phAtual').value );
            
            var khDesejado = parseFloat( document.getElementById('khDesejado').value );
            var phDesejado = parseFloat( document.getElementById('phDesejado').value );

            var v = volume / baseVolume;
            var kh = khDesejado - khAtual;
            var doseAlkaline = (v * baseDose) * (baseDose / kh);
            var doseAcid = doseAlkaline / phDesejado;
            document.getElementById('alkaline').value = doseAlkaline.toFixed(1);
            document.getElementById('acid').value = doseAcid.toFixed(1);
        }        
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>