<?php
$examples = [
    'PHP' => ['Hello World', 'Função de Conexão MySQL', 'Manipulação de Arrays', 'Upload de Arquivos', 'Sessões e Cookies'],
    'JavaScript' => ['Fetch API', 'Manipulação de DOM', 'Event Listeners', 'Promises', 'Async/Await'],
    'Python' => ['Funções Lambda', 'Web Scraping', 'Manipulação de Arquivos', 'Expressões Regulares', 'APIs com Flask'],
    'SQL' => ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'JOIN'],
    'Git' => ['Commit', 'Branch', 'Merge', 'Rebase', 'Stash'],
];

function getExampleCode($lang, $topic) {
    $examples = [
        'PHP:Hello World' => '<?php echo "Hello World!"; ?>',
        'PHP:Função de Conexão MySQL' => '<?php
function conectar() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dbname";
    try {
        return new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    } catch(PDOException $e) {
        die("Erro: ".$e->getMessage());
    }
}',
        'PHP:Manipulação de Arrays' => '<?php
$array = [1, 2, 3];
array_push($array, 4);
print_r($array);',
        'PHP:Upload de Arquivos' => '<?php
if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = basename($_FILES["file"]["name"]);
    move_uploaded_file($tmp_name, "uploads/$name");
}',
        'PHP:Sessões e Cookies' => '<?php
session_start();
$_SESSION["user"] = "JohnDoe";
setcookie("user", "JohnDoe", time() + 3600);',
        'JavaScript:Fetch API' => 'fetch("https://api.example.com/data")
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error("Erro:", error));',
        'JavaScript:Manipulação de DOM' => 'document.getElementById("elemento").innerHTML = "Novo conteúdo";',
        'JavaScript:Event Listeners' => 'document.getElementById("botao").addEventListener("click", function() {
    alert("Botão clicado!");
});',
        'JavaScript:Promises' => 'new Promise((resolve, reject) => {
    setTimeout(() => resolve("Sucesso!"), 1000);
}).then(result => console.log(result));',
        'JavaScript:Async/Await' => 'async function fetchData() {
    const response = await fetch("https://api.example.com/data");
    const data = await response.json();
    console.log(data);
}',
        'Python:Funções Lambda' => 'soma = lambda x, y: x + y
print(soma(2, 3))',
        'Python:Web Scraping' => 'import requests
from bs4 import BeautifulSoup

url = "https://example.com"
response = requests.get(url)
soup = BeautifulSoup(response.text, "html.parser")
print(soup.title.string)',
        'Python:Manipulação de Arquivos' => 'with open("arquivo.txt", "r") as file:
    content = file.read()
    print(content)',
        'Python:Expressões Regulares' => 'import re

text = "Hello, my email is example@example.com"
match = re.search(r"[\w\.-]+@[\w\.-]+", text)
if match:
    print("Email encontrado:", match.group())',
        'Python:APIs com Flask' => 'from flask import Flask

app = Flask(__name__)

@app.route("/")
def home():
    return "Hello, World!"

if __name__ == "__main__":
    app.run()',
        'SQL:SELECT' => 'SELECT * FROM tabela WHERE condicao;',
        'SQL:INSERT' => 'INSERT INTO tabela (coluna1, coluna2) VALUES (valor1, valor2);',
        'SQL:UPDATE' => 'UPDATE tabela SET coluna1 = valor1 WHERE condicao;',
        'SQL:DELETE' => 'DELETE FROM tabela WHERE condicao;',
        'SQL:JOIN' => 'SELECT * FROM tabela1 INNER JOIN tabela2 ON tabela1.id = tabela2.id;',
        'Git:Commit' => 'git commit -m "Mensagem do commit"',
        'Git:Branch' => 'git branch nome-da-branch',
        'Git:Merge' => 'git merge nome-da-branch',
        'Git:Rebase' => 'git rebase nome-da-branch',
        'Git:Stash' => 'git stash',
    ];
    return $examples["$lang:$topic"] ?? "Exemplo não encontrado.";
}

// Função para simular comandos do terminal
function executeTerminalCommand($command) {
    $output = [];
    exec($command, $output);
    return implode("\n", $output);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTools Suite</title>
    <style>
        :root {
            --primary: #0d1117;
            --secondary: #161b22;
            --accent: #58a6ff;
            --text: #c9d1d9;
            --border: #30363d;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Fira Code', monospace;
        }
        body {
            background-color: var(--primary);
            color: var(--text);
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .tool-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .card {
            background: var(--secondary);
            border-radius: 15px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .code-block {
            background: #000;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            overflow-x: auto;
            border: 1px solid var(--border);
        }
        button {
            background: var(--accent);
            color: var(--primary);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        button:hover {
            opacity: 0.8;
        }
        .live-preview {
            border: 2px solid var(--accent);
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { border-color: var(--accent); }
            50% { border-color: #85d7ff; }
            100% { border-color: var(--accent); }
        }
        .password-strength {
            width: 100%;
            height: 8px;
            background: #333;
            border-radius: 4px;
            margin-top: 10px;
            overflow: hidden;
        }
        .strength-bar {
            height: 100%;
            width: 0;
            background: #58a6ff;
            transition: width 0.3s ease;
        }
        .radio-group {
            margin: 10px 0;
        }
        .radio-group label {
            margin-right: 15px;
        }
        input[type="color"] {
            width: 100%;
            height: 40px;
            cursor: pointer;
            background: var(--secondary);
            border: 1px solid var(--border);
        }
        #search {
            width: 100%;
            padding: 12px;
            background: var(--secondary);
            border: 1px solid var(--border);
            color: var(--text);
            margin: 20px 0;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            border-top: 1px solid var(--border);
        }
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .tool-card {
            animation: slideIn 0.5s ease forwards;
            opacity: 0;
        }
        .tool-card:nth-child(1) { animation-delay: 0.1s; }
        .tool-card:nth-child(2) { animation-delay: 0.2s; }
        .tool-card:nth-child(3) { animation-delay: 0.3s; }
        .terminal {
            background: var(--secondary);
            padding: 20px;
            border-radius: 15px;
            margin-top: 30px;
            border: 1px solid var(--border);
        }
        #terminal-output {
            height: 300px;
            overflow-y: auto;
            margin-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }
        .terminal-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #terminal-command {
            flex-grow: 1;
            background: transparent;
            border: none;
            color: var(--text);
            padding: 8px;
            border-bottom: 1px solid var(--border);
        }
        .command { color: var(--accent); }
        .output { color: #8b949e; margin-bottom: 10px; }
        .diff ins {
            background: #4dffb355;
            text-decoration: none;
        }
        .diff del {
            background: #ff454555;
            text-decoration: none;
        }
        .match {
            background: #4dffb333;
            padding: 2px 4px;
            border-radius: 3px;
        }
        #table-name {
            margin-bottom: 15px;
        }
        .field {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        .field input {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🛠️ DevTools Suite <span class="live-indicator"></span></h1>
        <p>Develop @sentinelzxofc</p>
        <div class="tool-card">
            <h2>⏳ Conversor de Timestamp</h2>
            <input type="text" id="timestamp" placeholder="Insira timestamp ou data">
            <button onclick="convertTimestamp()">Converter</button>
            <div id="timestamp-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔠 Formattedor JSON</h2>
            <textarea id="json-input" rows="5" placeholder="Cole seu JSON aqui"></textarea>
            <button onclick="formatJSON()">Formatar</button>
            <pre id="json-output"></pre>
        </div>
        <div class="tool-card">
            <h2>📝 Gerador de Texto</h2>
            <input type="number" id="paragraphs" min="1" max="10" value="3">
            <button onclick="generateLorem()">Gerar</button>
            <div id="lorem-output"></div>
        </div>
        <div class="tool-card">
            <h2>📚 Cheatsheet</h2>
            <div class="category-selector">
                <?php foreach ($examples as $lang => $topics): ?>
                    <button class="lang-btn" onclick="showExamples('<?= $lang ?>')">
                        <?= $lang ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($examples as $lang => $topics): ?>
                <div class="examples" id="<?= $lang ?>-examples">
                    <?php foreach ($topics as $topic): ?>
                        <div class="code-block">
                            <h4><?= "$lang: $topic" ?></h4>
                            <pre><?= htmlspecialchars(getExampleCode($lang, $topic)) ?></pre>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="tool-card">
            <h2>🎨 Seletor de Cores</h2>
            <input type="color" id="color-picker" onchange="updateColorPicker()">
            <div class="color-preview" id="color-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔣 Codificação Base64</h2>
            <div class="radio-group">
                <label><input type="radio" name="base64-op" value="encode" checked> Codificar</label>
                <label><input type="radio" name="base64-op" value="decode"> Decodificar</label>
            </div>
            <textarea id="base64-input" rows="3"></textarea>
            <button onclick="handleBase64()">Executar</button>
            <pre id="base64-output"></pre>
        </div>
        <div class="tool-card">
            <h2>🔗 Analisador de URL</h2>
            <input type="text" id="url-input" placeholder="Insira uma URL completa">
            <button onclick="parseURL()">Analisar</button>
            <pre id="url-output"></pre>
        </div>
        <div class="tool-card">
            <h2>🔐 Validador de Força de Senha</h2>
            <input type="password" id="password-input" placeholder="Digite sua senha">
            <div class="password-strength">
                <div class="strength-bar"></div>
                <div class="strength-text">Força: 0%</div>
            </div>
        </div>
        <div class="tool-card">
            <h2>📊 Comparador de Dados</h2>
            <div class="data-comparison">
                <textarea id="data1" placeholder="Dados 1"></textarea>
                <textarea id="data2" placeholder="Dados 2"></textarea>
            </div>
            <button onclick="compareData()">Comparar</button>
            <div id="comparison-result"></div>
        </div>
        <div class="tool-card">
            <h2>🔍 Testador de Regex</h2>
            <input type="text" id="regex-pattern" placeholder="Padrão Regex">
            <textarea id="regex-text" placeholder="Texto para testar"></textarea>
            <button onclick="testRegex()">Testar</button>
            <div id="regex-matches" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📁 Gerador de CRUD</h2>
            <div class="crud-generator">
                <input type="text" id="table-name" placeholder="Nome da tabela">
                <div id="fields-container">
                    <div class="field">
                        <input type="text" placeholder="Nome do campo">
                        <select>
                            <option>VARCHAR</option>
                            <option>INT</option>
                            <option>TEXT</option>
                            <option>DATETIME</option>
                        </select>
                    </div>
                </div>
                <button onclick="addField()">➕ Campo</button>
                <button onclick="generateCRUD()">Gerar SQL</button>
                <pre id="sql-output"></pre>
            </div>
        </div>
        <div class="tool-card terminal">
            <h2>💻 Terminal Web</h2>
            <div id="terminal-output"></div>
            <div class="terminal-input">
                <span>$ </span>
                <input type="text" id="terminal-command" placeholder="Digite um comando (help para ajuda)">
            </div>
        </div>
        <!-- Novas Ferramentas -->
        <div class="tool-card">
            <h2>📏 Conversor de Unidades</h2>
            <input type="number" id="unit-value" placeholder="Valor">
            <select id="unit-from">
                <option value="km">Quilômetros</option>
                <option value="m">Metros</option>
                <option value="cm">Centímetros</option>
            </select>
            <select id="unit-to">
                <option value="km">Quilômetros</option>
                <option value="m">Metros</option>
                <option value="cm">Centímetros</option>
            </select>
            <button onclick="convertUnit()">Converter</button>
            <div id="unit-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔳 Gerador de QR Code</h2>
            <input type="text" id="qr-text" placeholder="Texto para gerar QR Code">
            <button onclick="generateQRCode()">Gerar</button>
            <div id="qr-code" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📝 Validador de CPF/CNPJ</h2>
            <input type="text" id="cpf-cnpj" placeholder="Insira CPF ou CNPJ">
            <button onclick="validateCPFCNPJ()">Validar</button>
            <div id="cpf-cnpj-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔐 Gerador de Senhas</h2>
            <input type="number" id="password-length" placeholder="Tamanho da senha">
            <button onclick="generatePassword()">Gerar</button>
            <div id="generated-password" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔢 Calculadora de Hash</h2>
            <input type="text" id="hash-input" placeholder="Texto para calcular hash">
            <select id="hash-algorithm">
                <option value="md5">MD5</option>
                <option value="sha1">SHA1</option>
                <option value="sha256">SHA256</option>
            </select>
            <button onclick="calculateHash()">Calcular</button>
            <div id="hash-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📄 Formatador de XML</h2>
            <textarea id="xml-input" rows="5" placeholder="Cole seu XML aqui"></textarea>
            <button onclick="formatXML()">Formatar</button>
            <pre id="xml-output"></pre>
        </div>
        <div class="tool-card">
            <h2>🌐 Testador de API</h2>
            <input type="text" id="api-url" placeholder="URL da API">
            <button onclick="testAPI()">Testar</button>
            <div id="api-response" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>💱 Conversor de Moedas</h2>
            <input type="number" id="currency-value" placeholder="Valor">
            <select id="currency-from">
                <option value="USD">Dólar (USD)</option>
                <option value="BRL">Real (BRL)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>
            <select id="currency-to">
                <option value="USD">Dólar (USD)</option>
                <option value="BRL">Real (BRL)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>
            <button onclick="convertCurrency()">Converter</button>
            <div id="currency-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔑 Gerador de UUID</h2>
            <button onclick="generateUUID()">Gerar</button>
            <div id="uuid-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📝 Editor de Markdown</h2>
            <textarea id="markdown-input" rows="5" placeholder="Escreva seu Markdown aqui"></textarea>
            <button onclick="renderMarkdown()">Renderizar</button>
            <div id="markdown-output" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📧 Validador de Email</h2>
            <input type="text" id="email-input" placeholder="Insira um email">
            <button onclick="validateEmail()">Validar</button>
            <div id="email-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📝 Gerador de Lorem Ipsum Avançado</h2>
            <input type="number" id="lorem-paragraphs" placeholder="Número de parágrafos">
            <button onclick="generateAdvancedLorem()">Gerar</button>
            <div id="advanced-lorem-output" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📈 Calculadora de Juros Compostos</h2>
            <input type="number" id="principal" placeholder="Principal">
            <input type="number" id="rate" placeholder="Taxa de juros (%)">
            <input type="number" id="time" placeholder="Tempo (anos)">
            <button onclick="calculateCompoundInterest()">Calcular</button>
            <div id="compound-interest-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📊 Gerador de Gráficos</h2>
            <input type="text" id="chart-data" placeholder="Dados (ex: 10,20,30)">
            <button onclick="generateChart()">Gerar</button>
            <canvas id="chart-output"></canvas>
        </div>
        <div class="tool-card">
            <h2>📄 Validador de JSON</h2>
            <textarea id="json-validate-input" rows="5" placeholder="Cole seu JSON aqui"></textarea>
            <button onclick="validateJSON()">Validar</button>
            <div id="json-validate-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📝 Compressor de Texto</h2>
            <textarea id="compress-input" rows="5" placeholder="Texto para comprimir"></textarea>
            <button onclick="compressText()">Comprimir</button>
            <div id="compress-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📦 Gerador de Código de Barras</h2>
            <input type="text" id="barcode-text" placeholder="Texto para gerar código de barras">
            <button onclick="generateBarcode()">Gerar</button>
            <div id="barcode-output" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📄 Validador de XML</h2>
            <textarea id="xml-validate-input" rows="5" placeholder="Cole seu XML aqui"></textarea>
            <button onclick="validateXML()">Validar</button>
            <div id="xml-validate-result" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>📊 Gerador de Tabelas HTML</h2>
            <input type="number" id="table-rows" placeholder="Número de linhas">
            <input type="number" id="table-cols" placeholder="Número de colunas">
            <button onclick="generateHTMLTable()">Gerar</button>
            <div id="html-table-output" class="live-preview"></div>
        </div>
        <div class="tool-card">
            <h2>🔗 Validador de URLs</h2>
            <input type="text" id="url-validate-input" placeholder="Insira uma URL">
            <button onclick="validateURL()">Validar</button>
            <div id="url-validate-result" class="live-preview"></div>
        </div>
    </div>
    <footer>
        <p>© 2024 DevTools Suite - Ferramentas essenciais para desenvolvedores</p>
        <div class="stats">
            <span id="total-commands">0</span> comandos executados 
            | <span id="tools-count">35</span> ferramentas disponíveis
        </div>
    </footer>
    <script>
        function convertTimestamp() {
            const input = document.getElementById('timestamp').value;
            const resultDiv = document.getElementById('timestamp-result');
            try {
                const date = isNaN(input) ? new Date(input) : new Date(parseInt(input));
                resultDiv.innerHTML = `
                    UNIX: ${Math.floor(date.getTime() / 1000)}<br>
                    UTC: ${date.toUTCString()}<br>
                    Local: ${date.toLocaleString()}
                `;
            } catch(e) {
                resultDiv.innerHTML = '❌ Formato inválido';
            }
        }
        function formatJSON() {
            const input = document.getElementById('json-input').value;
            try {
                const parsed = JSON.parse(input);
                document.getElementById('json-output').innerHTML = JSON.stringify(parsed, null, 2);
            } catch(e) {
                document.getElementById('json-output').innerHTML = '❌ JSON inválido';
            }
        }
        function generateLorem() {
            const paragraphs = document.getElementById('paragraphs').value;
            fetch(`https://baconipsum.com/api/?type=all-meat&paras=${paragraphs}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('lorem-output').innerHTML = data.join('<br><br>');
                });
        }
        function showExamples(lang) {
            document.querySelectorAll('.examples').forEach(div => {
                div.style.display = 'none';
            });
            document.getElementById(`${lang}-examples`).style.display = 'block';
        }
        function updateColorPicker() {
            const color = document.getElementById('color-picker').value;
            document.documentElement.style.setProperty('--accent', color);
        }
        function handleBase64() {
            const input = document.getElementById('base64-input').value;
            const operation = document.querySelector('input[name="base64-op"]:checked').value;
            try {
                const result = operation === 'encode' 
                    ? btoa(unescape(encodeURIComponent(input)))
                    : decodeURIComponent(escape(atob(input)));
                document.getElementById('base64-output').textContent = result;
            } catch(e) {
                document.getElementById('base64-output').textContent = '❌ Erro na operação';
            }
        }
        function parseURL() {
            const url = new URL(document.getElementById('url-input').value);
            const result = {
                Protocolo: url.protocol,
                Hostname: url.hostname,
                Path: url.pathname,
                Parâmetros: Object.fromEntries(url.searchParams.entries())
            };
            document.getElementById('url-output').textContent = JSON.stringify(result, null, 2);
        }
        function compareData() {
            const data1 = document.getElementById('data1').value;
            const data2 = document.getElementById('data2').value;
            const resultDiv = document.getElementById('comparison-result');
            if (data1 === data2) {
                resultDiv.innerHTML = 'Os dados são iguais.';
            } else {
                resultDiv.innerHTML = 'Os dados são diferentes.';
            }
        }
        function testRegex() {
            try {
                const pattern = document.getElementById('regex-pattern').value;
                const text = document.getElementById('regex-text').value;
                const regex = new RegExp(pattern, 'gm');
                const matches = text.match(regex) || [];
                document.getElementById('regex-matches').innerHTML = 
                    matches.map(m => `<span class="match">${m}</span>`).join('\n');
            } catch(e) {
                document.getElementById('regex-matches').innerHTML = '❌ Regex inválido';
            }
        }
        function addField() {
            const container = document.getElementById('fields-container');
            const field = document.createElement('div');
            field.className = 'field';
            field.innerHTML = `
                <input type="text" placeholder="Nome do campo">
                <select>
                    <option>VARCHAR</option>
                    <option>INT</option>
                    <option>TEXT</option>
                    <option>DATETIME</option>
                </select>
            `;
            container.appendChild(field);
        }
        function generateCRUD() {
            const tableName = document.getElementById('table-name').value;
            const fields = document.querySelectorAll('#fields-container .field');
            let sql = `CREATE TABLE ${tableName} (\n`;
            fields.forEach(field => {
                const name = field.querySelector('input[type="text"]').value;
                const type = field.querySelector('select').value;
                sql += `    ${name} ${type},\n`;
            });
            sql = sql.slice(0, -2) + '\n);';
            document.getElementById('sql-output').textContent = sql;
        }
        const terminalCommands = {
            help: () => 'Comandos disponíveis: help, clear, timestamp, ls, mkdir, cd, touch, rm, cat, echo, pwd, whoami, date, cp, mv',
            clear: () => {
                document.getElementById('terminal-output').innerHTML = '';
                return '';
            },
            timestamp: () => new Date().toLocaleString(),
            ls: () => '<?php echo executeTerminalCommand("ls"); ?>',
            mkdir: (args) => `<?php echo executeTerminalCommand("mkdir " . escapeshellarg($_POST['args'][0])); ?>`,
            cd: (args) => `<?php echo executeTerminalCommand("cd " . escapeshellarg($_POST['args'][0])); ?>`,
            touch: (args) => `<?php echo executeTerminalCommand("touch " . escapeshellarg($_POST['args'][0])); ?>`,
            rm: (args) => `<?php echo executeTerminalCommand("rm " . escapeshellarg($_POST['args'][0])); ?>`,
            cat: (args) => `<?php echo executeTerminalCommand("cat " . escapeshellarg($_POST['args'][0])); ?>`,
            echo: (args) => `<?php echo executeTerminalCommand("echo " . escapeshellarg($_POST['args'][0])); ?>`,
            pwd: () => '<?php echo executeTerminalCommand("pwd"); ?>',
            whoami: () => '<?php echo executeTerminalCommand("whoami"); ?>',
            date: () => '<?php echo executeTerminalCommand("date"); ?>',
            cp: (args) => `<?php echo executeTerminalCommand("cp " . escapeshellarg($_POST['args'][0]) . " " . escapeshellarg($_POST['args'][1])); ?>`,
            mv: (args) => `<?php echo executeTerminalCommand("mv " . escapeshellarg($_POST['args'][0]) . " " . escapeshellarg($_POST['args'][1])); ?>`
        };
        document.getElementById('terminal-command').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const input = e.target.value.trim().toLowerCase();
                const [command, ...args] = input.split(' ');
                const output = terminalCommands[command] 
                    ? terminalCommands[command](args)
                    : `Comando não encontrado: ${command}`;
                document.getElementById('terminal-output').innerHTML += `
                    <div class="command">$ ${input}</div>
                    <div class="output">${output}</div>
                `;
                e.target.value = '';
            }
        });
        document.getElementById('password-input').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = calculatePasswordStrength(password);
            const bar = document.querySelector('.strength-bar');
            const text = document.querySelector('.strength-text');
            bar.style.width = strength.percentage + '%';
            text.textContent = `Força: ${strength.percentage}% (${strength.label})`;
            bar.style.background = strength.color;
        });
        function calculatePasswordStrength(password) {
            const analysis = {
                length: password.length,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                numbers: /\d/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };
            let score = Object.values(analysis).filter(Boolean).length * 20;
            score += Math.min(password.length * 2, 40);
            return {
                percentage: Math.min(score, 100),
                label: score < 40 ? 'Fraca' : score < 80 ? 'Moderada' : 'Forte',
                color: score < 40 ? '#ff4545' : score < 80 ? '#ffdf45' : '#58a6ff'
            };
        }
        document.addEventListener('DOMContentLoaded', () => {
            showExamples('PHP');
            document.getElementById('total-commands').textContent = 0;
        });
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                localStorage.setItem('devToolsData', document.body.innerHTML);
                alert('Progresso salvo localmente!');
            }
        });
        window.onload = () => {
            const savedData = localStorage.getItem('devToolsData');
            if (savedData) {
                document.body.innerHTML = savedData;
            }
        };
    </script>
</body>
</html>