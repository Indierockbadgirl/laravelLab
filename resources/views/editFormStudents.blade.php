<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    

</head>
<body>
    <h2>Edit Form for Student</h2>
    <form action="{{url('/students/update/'.$student->id)}}" method="post">
        @csrf
        <label for="stu_id">Student ID</label>
        <input type="text" id="stu_id" name="stu_idedit" value="{{$student->id}}" readonly><br>
        <label for="nametxt">Name: <input type="text" name="nameBoxedit" id="" value="{{$student->stu_name}}"></label><br>
        <label for="agetxt">Age: <input type="" name="ageBoxedit" id="" value="{{$student->age}}"></label><br>
        <label for="gradetxt">Grade: <select name="gradeBoxedit" id="">
            <option value="A" {{ $student->grade === 'A' ? 'selected' : '' }}>A</option>
            <option value="B" {{ $student->grade === 'B' ? 'selected' : '' }}>B</option>
            <option value="C" {{ $student->grade === 'C' ? 'selected' : '' }}>C</option>
            <option value="F" {{ $student->grade === 'F' ? 'selected' : '' }}>F</option>
        </select></label><br>
        <input type="submit" value="Update Student">
        
    </form>

    <h2>Students List ({{$studentAll->count()}} students) <a href="/students" class="btn btn-danger">Add Student</a> </h2>
    <table class="table">
        <thead><th>ID</th><th>Name</th><th>Age</th><th>Grade</th><th>Edit</th><th>Delete</th></thead>
        <tbody>
            @foreach ($studentAll as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->stu_name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->grade}}</td>
                    <td><a href="/students/editForm/{{$student->id}}"  class="btn btn-danger">edit</a></td>
                    <td><a href="/students/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this student?')" class="btn btn-danger">Delete</a></td>
                    
                </tr>
            @endforeach
            
           
        </tbody>
    </table>
</body>
</html>