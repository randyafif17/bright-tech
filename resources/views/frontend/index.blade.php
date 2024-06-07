<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Euginius Inc | Attendance</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend') }}/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Euginius Inc.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#data">Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-black bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Euginius Inc.</h1>
                <p class="lead">Website for Attendance</p>
                <a class="btn btn-lg btn-light" href="#about">Start scrolling!</a>
            </div>
        </header>
        <!-- About section-->
        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>About Euginius Inc.</h2>
                        <p class="lead">Euginius Inc. is a leading provider of innovative solutions in the field of technology and design. Our mission is to empower businesses and individuals with cutting-edge tools and resources to achieve their goals.</p>
                        <h3>Our Features</h3>
                        <ul>
                            <li>Clickable navigation links that smoothly scroll to different sections of the page.</li>
                            <li>Responsive design for seamless browsing experience across different devices.</li>
                            <li>Bootstrap's scrollspy feature highlights the active section in the navigation bar as you scroll.</li>
                            <li>Minimal custom CSS allows for easy customization to suit your unique design preferences.</li>
                        </ul>
                        <h3>Our Vision</h3>
                        <p>We envision a future where technology serves as a catalyst for positive change, driving innovation, efficiency, and growth in every sector.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Our Services</h2>
                        <p class="lead">At Euginius Inc., we offer a wide range of services to meet your business needs. Our dedicated team of professionals is committed to delivering exceptional results and helping you achieve your goals.</p>
                        <h3>Web Development</h3>
                        <p>We specialize in creating responsive and user-friendly websites that showcase your brand and drive engagement.</p>
                        <h3>Graphic Design</h3>
                        <p>Our talented designers bring your ideas to life with stunning visuals and creative solutions that leave a lasting impression.</p>
                        <h3>Digital Marketing</h3>
                        <p>From social media management to search engine optimization, we help you build and execute effective digital marketing strategies to reach your target audience.</p>
                        <h3>Consulting Services</h3>
                        <p>Our experienced consultants provide expert advice and guidance to help you make informed decisions and optimize your business processes.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="data">
            <div class="container">
                <h1 class="my-4">Attendance List</h1>
                    <form class="d-flex" method="GET" action="{{ route('frontend') }}">
                        <input class="form-control me-2" type="date" name="date" value="{{ $selectedDate }}">
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </form>                  
                <div class="row mt-3">
                    @foreach ($tasks as $index => $task)
                        @if ($index % 2 == 0)
                            </div><div class="row">
                        @endif
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3>{{ $task->name }}</h3>
                                    <p>{{ $task->role }}</p>
                                    <p>{{ $task->type }}</p>
                                    <p>Masuk: {{ $task->created_at }}</p>
                                    <p>Pulang: {{ $task->post_at }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- <section id="databoong">
            <div class="container">
                <h1 class="my-4">Task Cards</h1>
                <form method="GET" action="{{ route('frontend') }}">
                    <input type="date" name="date" value="{{ $selectedDate }}">
                    <button type="submit">Tampilkan</button>
                </form>
                
                <!-- Tampilan data tasks -->
                @foreach ($tasks as $task)
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $task->name }}</h3>
                            <p>{{ $task->role }}</p>
                            <p>{{ $task->type }}</p>
                            <p>Masuk: {{ $task->created_at }}</p>
                            <p>Pulang: {{ $task->post_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section> --}}

        <section>
            <div class="container">
                <h1 class="my-4">Create New Attendance</h1>
        
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Nama Pekerjaan</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama pekerjaan">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Divisi Kerja</label>
                        <select class="form-control" id="type" name="type">
                            <option value="{{ \App\Enums\TaskType::DepartmentSatu->value }}">{{ \App\Enums\TaskType::DepartmentSatu->value }}</option>
                            <option value="{{ \App\Enums\TaskType::DepartmentDua->value }}">{{ \App\Enums\TaskType::DepartmentDua->value }}</option>
                            <option value="{{ \App\Enums\TaskType::DepartmentTiga->value }}">{{ \App\Enums\TaskType::DepartmentTiga->value }}</option>
                            <option value="{{ \App\Enums\TaskType::DepartmentEmpat->value }}">{{ \App\Enums\TaskType::DepartmentEmpat->value }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="visit_at">Tanggal Masuk</label>
                        <input type="datetime-local" class="form-control datetimepicker" id="visit_at" name="visit_at">
                    </div>
                    <div class="form-group mb-3">
                        <label for="post_at">Tanggal Keluar</label>
                        <input type="datetime-local" class="form-control datetimepicker" id="post_at" name="post_at">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Laporan</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status Proyek</label>
                        <select class="form-control" id="status" name="status">
                            <option value="{{ \App\Enums\TaskStatus::Todo->value }}">{{ \App\Enums\TaskStatus::Todo->value }}</option>
                            <option value="{{ \App\Enums\TaskStatus::OnProgress->value }}">{{ \App\Enums\TaskStatus::OnProgress->value }}</option>
                            <option value="{{ \App\Enums\TaskStatus::Done->value }}">{{ \App\Enums\TaskStatus::Done->value }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="payment_status">Status Gaji</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="{{ \App\Enums\PaymentStatus::Paid->value }}">{{ \App\Enums\PaymentStatus::Paid->value }}</option>
                            <option value="{{ \App\Enums\PaymentStatus::Unpaid->value }}">{{ \App\Enums\PaymentStatus::Unpaid->value }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="linkedin_link">LinkedIn Link</label>
                        <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="https://www.linkedin.com/in/...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>

        <!-- Contact section-->
        <section id="contact">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Contact us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Euginius Inc. 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('frontend') }}/js/scripts.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('description');
            flatpickr('.datetimepicker', {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                });
            });
        </script>
    </body>
</html>
