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
                        <h2>About this page</h2>
                        <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
                        <ul>
                            <li>Clickable nav links that smooth scroll to page sections</li>
                            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
                            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Services we offer</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="data">
            <div class="container">
                <h1 class="my-4">Task Cards</h1>
                <div class="row">
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
