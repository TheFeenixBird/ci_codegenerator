

<form action="<?php echo base_url('index.php/generate/manageInput') ?>" method="POST" id="mainForm">

<div class="container" style="padding-bottom: 2rem;">
    <div class="item ">
        <div class="form-group">
            <h2>INPUT</h2>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="input" id="input" value="file-xml">XML FILE
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="input" id="input" value="db-mysql">Database MySQL
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="input" id="input" value="file-flex">Flex Data Object File
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="input" id="input" value="opt4">Manual
                </label>
            </div>
        </div>
    </div>
<h1 class="main-title" ><a href="<?php echo base_url(); ?>">Dashboard</a></h1>
    <div class="item">
        <div class="form-group">
            <h2>OUTPUT</h2>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="output" id="output" value="java-android-studio-ORM-template">Java Android Studio
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="output" id="output" value="php-pdo">PHP PDO
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="output" id="output" value="flex">Flex
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="output" id="output" value="opt4">Manual
                </label>
            </div>
        </div>
    </div>
    </div>
</form>

    <div class="container-fluid"  style="padding-bottom: 10px;">
        <div class="fieldset"">
            <fieldset>
                <legend style="text-align: center">Input</legend>
                <div id="messageDiv"></div>
                <div id=inputDiv></div>
            </fieldset>
        </div>
    </div>
    <div class="container-fluid">
        <div class="fieldset">
            <fieldset>
                <legend style="text-align: center">Output</legend>
                <div id=outputDiv></div>
            </fieldset>
        </div>
    </div>
