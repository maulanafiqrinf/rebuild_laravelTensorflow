<section class="about2-area">
    <div class="custom-container">
        <div class="about2-inner-box">

            <div class="about2-header">
                <h1 class="section-title">Klasifikasi Jenis Penyakit Padi</h1>
            </div>

            <div class="tab-content about2-tab-content">
                <div class="tab-pane fade show active" id="business_strategy" role="tabpanel"
                    aria-labelledby="business_strategy-tab">
                    <div class="about2-tab-content-body d-flex gap-24">
                        <div class="img-box">
                            <img src="https://rebuild-laravel-tensorflow.vercel.app/assets/imglndg/sawah.jpg"
                                alt="About" />
                        </div>

                        <div class="content-box card-h">
                            <div class="mac-btns-wrap d-flex align-items-center justify-content-between">
                                <div class="mac-buttons d-flex align-items-center">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <div class="action-btn d-flex align-items-center">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <h1>
                                <span class="icon"><img
                                        src="https://eclectic-narwhal-7eb4c2.netlify.app/assets/imgs/hwd-icon-1.svg"
                                        alt="Icon" /></span> Masukkan Gambar Penyakit Tanaman
                            </h1>
                            <div class="content">
                                <p>
                                    Tanaman padi memiliki peran krusial
                                    dalam ekonomi Indonesia.
                                    Namun, produksi sering terhambat oleh penyakit daun, serta menyebabkan
                                    kerugian bagi petani. Meskipun Kabupaten Tuban merupakan produsen padi
                                    tertinggi nomor 5 di Jawa Timur pada tahun 2023, serangan penyakit daun
                                    seringkali mengurangi produksinya. Saat ini, pendeteksian penyakit masih
                                    dilakukan secara manual. Penelitian ini mengimplementasikan Metode CNN,
                                    yang berpotensi signifikan dalam penanganan penyakit daun pada tanaman
                                    padi.
                                </p>

                                <!-- Buttons for detection methods -->
                                <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                                    <button onclick="initWebcam()"
                                        style="
                                        background-color: #4CAF50; 
                                        color: white; 
                                        padding: 10px 20px; 
                                        border: none; 
                                        border-radius: 5px; 
                                        font-size: 16px; 
                                        cursor: pointer;
                                        transition: background-color 0.3s;">
                                        Webcam
                                    </button>
                                    <label for="fileInput"
                                        style="
                                        background-color: #007BFF; 
                                        color: white; 
                                        padding: 10px 20px; 
                                        border: none; 
                                        border-radius: 5px; 
                                        font-size: 16px; 
                                        cursor: pointer;
                                        display: inline-block;
                                        transition: background-color 0.3s;">
                                        Upload Image
                                        <input type="file" id="fileInput" accept="image/*"
                                            onchange="handleFileUpload()" style="display: none;">
                                    </label>
                                </div>

                                <div id="webcam-container" style="margin-top: 20px; text-align: center;"></div>
                                <div id="label-container"
                                    style="
                                    margin-top: 20px; 
                                    padding: 10px; 
                                    background-color: #f8f9fa; 
                                    border: 1px solid #ddd; 
                                    border-radius: 5px; 
                                    text-align: center; 
                                    font-size: 14px; 
                                    line-height: 1.5;">
                                </div>

                                <!-- TensorFlow.js and Teachable Machine libraries -->
                                <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

                                <script type="text/javascript">
                                    // Teachable Machine model URL
                                    const URL = "https://teachablemachine.withgoogle.com/models/T-do_RXNh/";

                                    let model, webcam, labelContainer, maxPredictions;

                                    // Load the image model and setup the webcam
                                    async function initModel() {
                                        const modelURL = URL + "model.json";
                                        const metadataURL = URL + "metadata.json";

                                        // Load model and metadata
                                        model = await tmImage.load(modelURL, metadataURL);
                                        maxPredictions = model.getTotalClasses();

                                        // Set up the label container
                                        labelContainer = document.getElementById("label-container");
                                        labelContainer.innerHTML = ""; // Clear previous labels
                                        for (let i = 0; i < maxPredictions; i++) {
                                            labelContainer.appendChild(document.createElement("div"));
                                        }
                                    }

                                    // Webcam detection setup
                                    async function initWebcam() {
                                        await initModel(); // Load the model first

                                        const flip = true; // Flip the webcam horizontally
                                        webcam = new tmImage.Webcam(200, 200, flip); // Webcam width, height, flip
                                        await webcam.setup(); // Request access to the webcam
                                        await webcam.play();
                                        document.getElementById("webcam-container").appendChild(webcam.canvas);
                                        window.requestAnimationFrame(webcamLoop);
                                    }

                                    async function webcamLoop() {
                                        webcam.update(); // Update webcam frame
                                        await predictWebcam();
                                        window.requestAnimationFrame(webcamLoop);
                                    }

                                    // Predict from webcam
                                    async function predictWebcam() {
                                        const prediction = await model.predict(webcam.canvas);
                                        updateLabels(prediction);
                                    }

                                    // Handle image file upload
                                    async function handleFileUpload() {
                                        const fileInput = document.getElementById("fileInput");
                                        if (!fileInput.files.length) {
                                            alert("Please select an image.");
                                            return;
                                        }

                                        await initModel(); // Load the model first

                                        const file = fileInput.files[0];
                                        const reader = new FileReader();

                                        reader.onload = async function(event) {
                                            const img = new Image();
                                            img.src = event.target.result;

                                            img.onload = async function() {
                                                // Use Teachable Machine model to predict
                                                const prediction = await model.predict(img);
                                                updateLabels(prediction);
                                            };
                                        };
                                        reader.readAsDataURL(file);
                                    }

                                    // Update labels for predictions
                                    function updateLabels(predictions) {
                                        for (let i = 0; i < maxPredictions; i++) {
                                            const classPrediction =
                                                predictions[i].className + ": " + (predictions[i].probability * 100).toFixed(2) + "%";
                                            labelContainer.childNodes[i].innerHTML = classPrediction;
                                        }
                                    }
                                </script>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
