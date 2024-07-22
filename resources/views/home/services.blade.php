<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light" id="services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-7 py-5">
                <div class="py-lg-5">
                    <div class="row justify-content-center pb-5">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-3">Our Services</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-flex">
                                <div class="icon justify-content-center align-items-center d-flex"><span
                                        class="flaticon-ambulance"></span></div>
                                <div class="media-body pl-md-4">
                                    <h3 class="heading mb-3">Emergency Services</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-flex">
                                <div class="icon justify-content-center align-items-center d-flex"><span
                                        class="flaticon-doctor"></span></div>
                                <div class="media-body pl-md-4">
                                    <h3 class="heading mb-3">Qualified Doctors</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-flex">
                                <div class="icon justify-content-center align-items-center d-flex"><span
                                        class="flaticon-stethoscope"></span></div>
                                <div class="media-body pl-md-4">
                                    <h3 class="heading mb-3">Outdoors Checkup</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-flex">
                                <div class="icon justify-content-center align-items-center d-flex"><span
                                        class="flaticon-24-hours"></span></div>
                                <div class="media-body pl-md-4">
                                    <h3 class="heading mb-3">24 Hours Service</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex">
                <div class="appointment-wrap bg-white p-4 p-md-5 d-flex align-items-center">
                    <form action="{{ url('/add_janji') }}" method="POST" class="appointment-form ftco-animate"
                        id="janjiForm">
                        @csrf
                        <h3>Jadwalkan Konseling Offline</h3>
                        <div class="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                    required>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="masalah" id="" class="form-control" required>
                                            <option value="">Select Your Services</option>
                                            <option value="cinta">Permasalahan Cinta</option>
                                            <option value="keluarga">Permasalahan Keluarga</option>
                                            <option value="lainnya">Permasalahan Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone" name="nomor" required>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <input type="datetime-local" class="form-control appointment_date"
                                        placeholder="Date" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <textarea id="" cols="30" rows="2" class="form-control" placeholder="Message" name="keterangan"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
                            </div>
                        </div>
                    </form>
                    <div class="overlay" id="overlay">
                        <div class="text-center">
                            <img src="{{ asset('home/images/gembok.png') }}" alt="Lock Icon" style="max-width: 50px;">
                            <p>Silakan login terlebih dahulu</p>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                /* CSS untuk mengatur blur */
                .blur {
                    filter: blur(4px);
                    pointer-events: none;
                    /* Mencegah interaksi dengan form yang di-blur */
                }

                /* CSS untuk overlay */
                #overlay {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(255, 255, 255, 0.9);
                    /* Warna background overlay */
                    z-index: 999;
                    /* Menempatkan overlay di atas form */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                #overlay img {
                    margin-top: auto margin-bottom: 10px;
                }
            </style>

            <script>
                // Cek apakah pengguna login
                @if (!Auth::check())
                    // Ambil form dan overlay
                    const janjiForm = document.getElementById('janjiForm');
                    const overlay = document.getElementById('overlay');

                    // Tambahkan kelas blur ke form dan tampilkan overlay jika pengguna tidak login
                    janjiForm.classList.add('blur');
                    overlay.style.display = 'flex'; // Menampilkan overlay
                @else
                    // Jika pengguna login, hapus kelas blur dari form dan sembunyikan overlay
                    const janjiForm = document.getElementById('janjiForm');
                    const overlay = document.getElementById('overlay');

                    janjiForm.classList.remove('blur');
                    overlay.style.display = 'none'; // Menyembunyikan overlay
                @endif
            </script>


        </div>
    </div>
</section>
