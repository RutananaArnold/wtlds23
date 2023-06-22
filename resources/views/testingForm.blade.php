<!-- sensor-form.blade.php -->

<form action="" method="post">
    @csrf

    <div>
        <label for="sensor1">Sensor 1:</label>
        <input type="text" name="sensor1" id="sensor1" required>
    </div>

    <div>
        <label for="sensor2">Sensor 2:</label>
        <input type="text" name="sensor2" id="sensor2" required>
    </div>

    <div>
        <label for="status">Status (Numeric):</label>
        <input type="number" name="status" id="status" required>
    </div>

    <div>
        <label for="device_id">Device ID:</label>
        <input type="text" name="device_id" id="device_id" required>
    </div>

    <button type="submit">Submit</button>
</form>
