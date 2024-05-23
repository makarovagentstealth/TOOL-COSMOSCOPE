<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radar Astrofísico</title>
    <style>
        body {
            background-color: black;
            color: green;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .compass {
            background-color: black;
            color: green;
            border: 1px solid green;
            padding: 20px;
            width: 80%;
            height: 30%;
            overflow-y: scroll;
            white-space: pre-wrap;
            margin-bottom: 20px;
        }
        #payload {
            width: 80%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            font-family: 'Courier New', Courier, monospace;
        }
        button {
            padding: 10px;
            background-color: green;
            color: black;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <h1>Radar Astrofísico</h1>
    <textarea id="payload" placeholder="Cole o payload JSON aqui..."></textarea><br>
    <button onclick="analyze()">Analisar</button>

    <div class="compass" id="equations_compass">
        <h2>Equações</h2>
        <div id="equations_result">Resultado das equações aparecerá aqui...</div>
    </div>

    <div class="compass" id="rules_compass">
        <h2>Regras</h2>
        <div id="rules_result">Resultado das regras aparecerá aqui...</div>
    </div>

    <div class="compass" id="jwst_metadata_compass">
        <h2>Metadados da API do James Webb</h2>
        <div id="jwst_metadata_result">Metadados da API do James Webb aparecerão aqui...</div>
    </div>

    <script>
        function analyze() {
            const payload = document.getElementById('payload').value;
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: payload,
            })
            .then(response => response.json())
            .then(data => {
                // Verificar se as bússolas estão apontando para as evidências
                checkEvidence(data);
                // Farejar a porta 9000 do Celestia
                sniffCelestiaPort();
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        }

        function checkEvidence(data) {
            // Verificar evidências nas equações
            const equationsResult = data['equations_result'];
            const equationsEvidence = checkEquations(equationsResult);
            document.getElementById('equations_result').textContent = equationsEvidence;

            // Verificar evidências nas regras
            const rulesResult = data['rules_result'];
            const rulesEvidence = checkRules(rulesResult);
            document.getElementById('rules_result').textContent = rulesEvidence;

            // Exibir metadados da API do James Webb
            const jwstMetadataResult = JSON.stringify(data['jwst_metadata'], null, 2);
            document.getElementById('jwst_metadata_result').textContent = jwstMetadataResult;
        }

        function checkEquations(equationsResult) {
            // Implementar lógica para verificar as evidências nas equações
            // Neste exemplo, apenas retornaremos "Sim" se todas as equações retornarem algum resultado
            for (const key in equationsResult) {
                if (equationsResult.hasOwnProperty(key) && Object.keys(equationsResult[key]).length === 0) {
                    return "Não";
                }
            }
            return "Sim";
        }

        function checkRules(rulesResult) {
            // Implementar lógica para verificar as evidências nas regras
            // Neste exemplo, apenas retornaremos "Sim" se todas as regras retornarem algum resultado
            for (const key in rulesResult) {
                if (rulesResult.hasOwnProperty(key) && Object.keys(rulesResult[key]).length === 0) {
                    return "Não";
                }