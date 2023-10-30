<div class="container-xl g-0">
    <div class="bg-image-1">
        <div class="bg-dark bg-opacity-75 py-3">
            <div class="text-center text-light h2 pt-3">
                SM-AutoService
            </div>
            <div class="text-center text-info h6 pb-5">
                All of the dreams of your car are real with SM-AutoService <i class="bi bi-wrench"></i>
            </div>
            <div class="pb-5">
                <div class="row row-cols-2 row-cols-lg-4 justify-content-center align-items-center pt-3 pb-5">
                    <div class="col">
                        <div class="text-center">
                            <i class="bi bi-geo-alt-fill text-danger h3"></i>
                        </div>
                        <div class="text-center text-light h5">
                            We are everywhere
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="bi bi-person-badge-fill text-danger h3"></i>
                        </div>
                        <div class="text-center text-light h5">
                            {{ $workers[1]->experience }}+ years experinced employees
                        </div>
                    </div>
                    <div class="col mt-3 mt-lg-0">
                        <div class="text-center">
                            <i class="bi bi-car-front text-danger h3"></i>
                        </div>
                        <div class="text-center text-light h5">
                            {{ $cars->count() }}+ cars were repaired in a month
                        </div>
                    </div>
                    <div class="col mt-3 mt-lg-0">
                        <div class="text-center">
                            <i class="bi bi-person-circle text-danger h3"></i>
                        </div>
                        <div class="text-center text-light h5">
                            {{ $clients->count() }}+ clients we are servicing
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>