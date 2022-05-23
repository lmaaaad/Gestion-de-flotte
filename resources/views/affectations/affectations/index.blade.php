<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Affectations</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom table with datatable -->
   <link 
        
        rel="stylesheet" href=" https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" >   
    <!-- Custom styles for this template-->
    <link href="/rapport.css" rel="stylesheet">
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <a id='logo-orig' class="navbar-brand ps-0 " href="#" > 
                    <img src='/pic/logo-orig.png' alt=algerie-poste-logo>
                </a>
    
                <div class="sidebar-brand-text">Affectations</div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('affectations.affectations.index') }}">
                    <i><img src="/pic/affectation.png" style='height:30px;'></i>
                    <span class="pl-2 ">Affectations </span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->
@include('navbar')      
                    <!-- Content Row -->
                    <div class="row py-3">
                        <p>  
                            <a href="{{ route('affectations.affectations.create') }}" >
                                <button type="button" class="btn btn-success" ><img src="/pic/icon-add.png" id="add"> Ajouter </button>
                            </a>
                         </p>

                         
                      
            <div class="container pt-1 border rounded-3 mt-0" >
               <div class="table-responsive" >
               <table id="example" class="table table-striped"  style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">Conducteur</th>
                        <th scope="col">Date de Depart</th>
                        <th scope="col">Date de retour</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Arrivee</th>
                        <th scope="col">Affecte par</th>
                        <th scope="col">Action</th>
                       

                        

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($affectations as $affectation)
                        <tr>

                            <th scope="row"> {{  $affectation->conducteur->Nom }}  {{  $affectation->conducteur->Prenom }}</th>
                            <td>{{ $affectation->depart  }}</td>
                            <td>{{ $affectation->arrivee  }}</td>
                            <td>{{ $affectation->date_retour  }}</td>
                            <td>{{ $affectation->date  }}</td>
                            <td>{{ $affectation->affecte_par  }}</td>

            
                             <td> 
                                 <div class=" d-flex">
                                     <a class="mx-1" href="{{ route('affectations.affectations.edit',$affectation->id) }}" ><button class="btn btn-sm btn-primary" type="button">Modifier</button>  </a>

                                     <form id="delete-user-form-{{ $affectation->id }}" action="{{ route('affectations.affectations.destroy',$affectation->id) }}" method="POST">
                                         @csrf
                                         @method("DELETE")
                                         <button type="submit" class="mx-1 btn btn-sm btn-danger">
                                             Supprimer
                                          </button>
                                     </form>    
                                    </div>    
                            </td>
                          </tr>
                        @endforeach
                      
                      
                      
                    </tbody>
                  </table>
                  {{ $affectations->links() }}
                </div>
            </div>   
          
             <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        
            @include('footer')