<!-- resources/views/students/delete.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>
    <h1>Delete Student</h1>
    <p>Are you sure you want to delete this record?</p>
    <form id="deleteForm" action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" onclick="confirmDelete()">Delete</button>
    </form>

    <script>
        function confirmDelete() {
            console.log("Confirm delete function called");
            if (confirm("Are you sure you want to delete this record?")) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
</body>
</html>
