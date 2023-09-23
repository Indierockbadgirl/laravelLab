<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="students">Student List</a></li>
        </ul>
    </nav>
    <h1>Student Management</h1>
    <h2>Add Student</h2>
    <form action="students/insert" method="post">
        @csrf
        <label for="nametxt">Name: <input type="text" name="nameBox" id="" required pattern="[A-Za-z]{+}"></label><br>
        <label for="agetxt">Age: <input type="" name="ageBox" id=""required pattern="[0-9]{+}"></label><br>
        <label for="gradetxt">Grade: <select name="gradeBox" id=""><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="F">F</option></select></label><br>
        <input type="submit" value="submit">
        
    </form>
    <h2>Students List ({{$students->count()}} students)</h2>
    <table>
        <thead><th>ID</th><th>Name</th><th>Age</th><th>Grade</th><th>Edit</th><th>Delete</th></thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->stu_name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->grade}}</td>
                    <td><a href="students/editForm/{{$student->id}}"  class="btn btn-danger">edit</a></td>
                    <td><a href="students/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this student?')" class="btn btn-danger">Delete</a></td>
                    
                </tr>
            @endforeach
            
           
        </tbody>
    </table>
    @if (count($trashStudents)>0)
        <h2>Trash({{$trashStudents->count()}} students)</h2>
        <table>
            <thead><th>ID</th><th>Name</th><th>Age</th><th>Grade</th><th>Restore</th><th>Delete</th></thead>
            <tbody>
                @foreach ($trashStudents as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->stu_name}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->grade}}</td>
                        <td><a href="students/restore/{{$student->id}}" onclick="return confirm('Are you sure you want to restore this student?')" class="btn btn-primary">Restore</a></td>
                        <td><a href="students/forcedelete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this student?')" class="btn btn-danger">Delete</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
</body>
</html>