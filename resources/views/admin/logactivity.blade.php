@include('dashboard')
@section('konten')
@endsection
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Admin</a></div>
                <div class="breadcrumb-item">Log Aktifitas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-14 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Log Aktifitas</h4>
                        </div>
                        <div class="card-body">
                            <p class="section-lead">Aktifitas pengguna akan tampil disini.</p>

                            <div class="text-right">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-10">
                    <div class="table-responsive-sm">
                        <table id="theadnama_supplier" class="table table-sm table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>tanggal</th>
                                    <th>Jam</th>
                                    <th>Aktifitas</th>
                                    {{-- <th>jenis data</th> --}}
                                    <th>Nama User</th>
                                    <th>Akses User</th>
                                    <th>metode</th>
                                </tr>
                            </thead>
                            <tbody id="btabel">
                                @php
                                    $i=1
                                @endphp
                                @forelse ( $dataaa as $key => $item )
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item['date']}}</td>
                                    <td>{{$item['time']}}</td>
                                    <td>{{$item['activity']}}</td>
                                    {{-- <td>{{$item['jenisdata']}}</td> --}}
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['rightaccses']}}</td>
                                    <td>{{$item['method']}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Tidak Ada data Ditemukan</td>
                                </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>
</div>

</div>
</section>
</div>

<script type="text/javascript">

     $(document).ready(function() {
         $('#theadnama_supplier').DataTable({
             "pagingType": "full_numbers"
         });
     });
    </script>
{{-- <script type="module">
    // $(document).ready(function() {
    //     $('#theadnama_supplier').DataTable({
    //         "pagingType": "full_numbers"
    //     });
    // });

    var stdNo = 0;
    var tbody = document.getElementById('btabel');
    function AddItemToTable(date,time,activity,jenisdata,name,rightaccses,method){
        let trow = document.createElement('trow');
        let datex = document.createElement('td');
        let timex = document.createElement('td');
        let activityx = document.createElement('td');
        let jenisdatax = document.createElement('td');
        let namex = document.createElement('td');
        let rightaccsesx = document.createElement('td');
        let methodx = document.createElement('td');

        td.innerHTML= ++stdNo;
        datex.innerHTML= date;
        timex.innerHTML= time;
        activityx.innerHTML= activity;
        jenisdatax.innerHTML= jenisdata;
        namex.innerHTML= name;
        rightaccsesx.innerHTML= rightaccses;
        methodx.innerHTML= method;

        trow.appendCHild(datex);
        trow.appendCHild(timex);
        trow.appendCHild(activityx);
        trow.appendCHild(jenisdatax);
        trow.appendCHild(namex);
        trow.appendCHild(rightaccsesx);
        trow.appendCHild(methodx);

        tbody.appendCHild(trow);
    }

    function AddAllItemsToTable(datax){
        stdNo=0;
        tbody.innerHTML="";
        datax.forEach(element => {
            AddItemToTable(element.date,element.time,element.activity,element.jenisdata,element.name,element.rightaccses,element.method
                )
        });
    }
    //fre
    // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.7/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyC5hfI2CawCokJH7K3gYBae1oT8zZF97y8",
    authDomain: "mini-007.firebaseapp.com",
    databaseURL: "https://mini-007-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "mini-007",
    storageBucket: "mini-007.appspot.com",
    messagingSenderId: "929345661462",
    appId: "1:929345661462:web:a142d9eaa0ebf05d55e337",
    measurementId: "G-P7Q5HHFLGZ"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);

  import{
      getFirestore, doc, getDoc, getDocs, onSnapshot, collection
      }
    from "https://www.gstatic.com/firebasejs/9.6.7/firebase-app.js";
    const db = getFirestore();

  //get datauwu

  async function getdata() {
      const querySnapshot = await getDocs(collection(db,"mini-log"));

      var datalistarray = [];
      querySnapshot.forEach(doc =>{
          datalistarray.push(doc.data());
          AddAllItemsToTable(datalistarray);
      });

    windows.onload = getdata;
  }

</script> --}}

@include('layout.footer')
</footer>
