<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Webpage</title>
  <!-- Bootstrap CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <button type="button" class="add_post" data-toggle="modal" data-target="#add_post" >
                Add Post
            </button>

             <span class="sr-only">(current)</span></a>
        
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">

        <h1>Welcome to my webpage</h1>


        <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Post</th>
          <th>Content</th>
          <th>Published</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $num = 1;
          foreach ($data as  $value) {
            ?>
          <tr>
            <td>{{$num}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->content}}</td>
            <td>{{$value->is_published}}</td>
            <td>
              <button type="button" class="edit" data-toggle="modal" data-target="#edit" data-id="{{$value->id}}"data-title="{{$value->title}}"data-content="{{$value->content}}" >Edit
              </button>

              <button type="button" class="delete" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}">
                Delete

              </button>



            </td>
          </tr>

            <?php
            $num = $num + 1;
          } ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>


    <div class="modal fade" id="add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            <form role="form" action="{{url('/add_post')}}" method="post">

              @csrf

                      <div class="box-body">

                        <div class="form-group">

                          <label for="exampleInputEmail1">Title</label>

                          <input type="text" name="Title" class="form-control " id="exampleInputEmail1" placeholder="Enter Title">

                        </div>

                        <div class="form-group">

                          <label for="exampleInputEmail1">content</label>

                          <input type="text" name="content" class="form-control " id="exampleInputEmail1" placeholder="Enter content">

                        </div>




                      </div>



          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Add</button>

            </form>

          </div>

        </div>

      </div>

    </div>



  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <form role="form" action="{{url('/edit_post')}}" method="post">

            @csrf

            <input type="hidden" class="edit_id" name="id" value="">

                    <div class="box-body">

                      <div class="form-group">

                        <label for="exampleInputEmail1">Title</label>

                        <input type="text" name="Title" class="form-control edit_title" id="exampleInputEmail1" placeholder="Enter Title">

                      </div>

                      <div class="form-group">

                        <label for="exampleInputEmail1">content</label>

                        <input type="text" name="content" class="form-control edit_content" id="exampleInputEmail1" placeholder="Enter Number">

                      </div>




                    </div>



        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Edit</button>

          </form>

        </div>

      </div>

    </div>

  </div>


  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <form role="form" action="{{url('/delete_post')}}" method="post">

            @csrf

                    <div class="box-body">

                      <input type="hidden" class="delete_id" name="id" value="">

                      <p>Are you sure you want to delete this Post?</p>

                    </div>



        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary btn-primary2">Confirm</button>

          </form>

        </div>

      </div>

    </div>

  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>

  $('.delete').click(function(){
    $('.delete_id').val($(this).attr("data-id"));
  })

  $('.edit').click(function(){
  $('.edit_id').val($(this).attr("data-id"));
  $('.edit_title').val($(this).attr("data-title"));
  $('.edit_content').val($(this).attr("data-content"));


  })
  </script>

  <!-- Bootstrap JS and jQuery -->
</body>
</html>
