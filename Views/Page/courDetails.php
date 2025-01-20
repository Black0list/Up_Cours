<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap');

        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --success: #059669;
            --danger: #dc2626;
            --warning: #d97706;
            --background: #f9fafb;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --border: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto Slab", 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            line-height: 1.5;
            padding: 30px 120px;
        }

        .main-content {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Course Header Section */
        .course-header {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .course-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--primary), #818cf8);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .course-meta {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
        }

        .meta-item i {
            color: var(--primary);
        }

        .course-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .tag {
            background: #e0e7ff;
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Course Content Grid */
        .course-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        @media (max-width: 1024px) {
            .course-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Course Description Section */
        .course-description {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .description-content {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Course Curriculum */
        .curriculum-section {
            margin-top: 2rem;
        }

        .module {
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .module-header {
            padding: 1rem 1.5rem;
            background: #f8fafc;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .module-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .module-content {
            display: none;
            padding: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .module.active .module-content {
            display: block;
        }

        .lesson-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .lesson-item i {
            color: var(--primary);
        }

        /* Course Sidebar */
        .course-sidebar {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 2rem;
        }

        .price-tag {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .enroll-button {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1.125rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .enroll-button:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.1);
        }

        .course-features {
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            color: var(--text-secondary);
        }

        .feature-item i {
            color: var(--success);
        }

        /* Instructor Section */
        .instructor-section {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
        }

        .instructor-info {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .instructor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .instructor-details h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .instructor-bio {
            color: var(--text-secondary);
            margin-top: 1rem;
        }

        /* Progress Bar */
        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e5e7eb;
            border-radius: 4px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress {
            width: 0%;
            height: 100%;
            background: var(--primary);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        /* Reviews Section */
        .reviews-section {
            margin-top: 2rem;
        }

        .review-card {
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .rating {
            color: #fbbf24;
        }

        .review-date {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <!-- Course Header -->
        <div class="course-header">
            <h1 class="course-title"><?php echo $cour->getTitle() ?></h1>
            <div class="course-meta">
                <!-- <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>24 hours of content</span>
                </div> -->
                <div class="meta-item">
                    <i class="fas fa-user-graduate"></i>
                    <span><Strong><?php echo $cour->getEnseignant()->getName() ?></Strong></span>
                </div>
                <div class="meta-item">
                    <i class="fa fa-bookmark"></i>
                    <span><?php echo $cour->getCategory()->getName() ?></span>
                </div>
            </div>
            <div class="meta-item">
                <i class="fa fa-tags"></i>
                <span>
                    <?php foreach($cour->getTags() as $tag){
                        echo $tag->getName() . " ";
                    } 
                    ?>
                </span>
            </div>
        </div>

        <!-- Course Content Grid -->
        <div class="course-grid">
            <!-- Left Column -->
            <div class="course-main">
                <!-- Course Description -->
                <div class="course-description">
                    <h2 class="section-title">Course Description</h2>
                    <div class="description-content">
                        <p><?php echo $cour->getDescription() ?></p>
                        <div class="progress-bar">
                            <div class="progress" style="width: 75%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Curriculum Section -->
                <div class="curriculum-section">
                    <h2 class="section-title">Course Content</h2>
                    <div class="module active">
                        <div class="module-header">
                            <h3></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="module-content">
                            <!-- TODO  create course with content-->
                            <div class="lesson-item">
                                <i class="fas fa-play-circle"></i>
                                <span>Video</span>
                            </div>
                            <div class="lesson-item">
                                <i class="fas fa-file-alt"></i>
                                <span>Document</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instructor Section -->
                <div class="instructor-section">
                    <h2 class="section-title"></h2>
                    <div class="instructor-info">
                        <div class="instructor-details">
                            <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
                        </div>
                    </div>
                    <!-- <p class="instructor-bio">
                        Expert web developer with a passion for teaching and helping others master modern web technologies.
                    </p> -->
                </div>

                <!-- Reviews Section -->
                <!-- <div class="reviews-section">
                    <h2 class="section-title">Student Reviews</h2>
                    <div class="review-card">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <img src="/api/placeholder/40/40" alt="Reviewer" style="border-radius: 50%;">
                                <div>
                                    <h4>Sarah Johnson</h4>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="review-date">2 days ago</span>
                        </div>
                        <p>Excellent course! The content is well-structured and the instructor explains complex concepts clearly.</p>
                    </div>
                </div> -->
            </div>

            <!-- Right Column - Sidebar -->
            <div class="course-sidebar">
                <div class="price-tag"></div>
                <button class="enroll-button">Subscribe Now</button>
                <div class="course-features">
                    <div class="feature-item">
                        <i class="fas fa-video"></i>
                        <span>24 hours on-demand video</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-infinity"></i>
                        <span>Full lifetime access</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Access on mobile and TV</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-certificate"></i>
                        <span>Certificate of completion</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Module accordion functionality
        document.querySelectorAll('.module-header').forEach(header => {
            header.addEventListener('click', () => {
                const module = header.parentElement;
                module.classList.toggle('active');

                // Update chevron icon
                const icon = header.querySelector('i');
                if (module.classList.contains('active')) {
                    icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                } else {
                    icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                }
            });
        });

        // Progress bar animation
        document.addEventListener('DOMContentLoaded', () => {
            const progress = document.querySelector('.progress');
            progress.style.width = '75%';
        });

        // Enroll button interaction
        const enrollButton = document.querySelector('.enroll-button');
        enrollButton.addEventListener('click', () => {
            enrollButton.textContent = 'Enrolling...';
            enrollButton.style.opacity = '0.8';

            // Simulate enrollment process
            setTimeout(() => {
                enrollButton.textContent = 'Enrolled!';
                enrollButton.style.backgroundColor = 'var(--success)';
                enrollButton.disabled = true;

                // Show success message
                showNotification('Successfully enrolled in the course!');
            }, 1500);
        });

        // Notification system
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;

            // Add notification styles dynamically
            const style = document.createElement('style');
            style.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--success);
                color: white;
                padding: 1rem 2rem;
                border-radius: 0.75rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                animation: slideIn 0.3s ease-out forwards;
            }

            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
            document.head.appendChild(style);

            document.body.appendChild(notification);

            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-in forwards';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Video preview functionality
        document.querySelectorAll('.lesson-item').forEach(lesson => {
            lesson.addEventListener('click', () => {
                if (lesson.querySelector('.fa-play-circle')) {
                    // Create modal for video preview
                    const modal = document.createElement('div');
                    modal.className = 'video-modal';
                    modal.innerHTML = `
                    <div class="video-modal-content">
                        <div class="video-modal-header">
                            <h3>${lesson.querySelector('span').textContent}</h3>
                            <button class="close-modal">&times;</button>
                        </div>
                        <div class="video-placeholder">
                            <iframe width="560" height="315" src="<?php echo $cour->getContent() ?>" title="YouTube video player" 
                            // frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            // referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                `;

                    // Add modal styles
                    const style = document.createElement('style');
                    style.textContent = `
                    .video-modal {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.8);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        z-index: 1000;
                    }

                    .video-modal-content {
                        background: white;
                        width: 90%;
                        max-width: 800px;
                        border-radius: 1rem;
                        overflow: hidden;
                    }

                    .video-modal-header {
                        padding: 1rem 1.5rem;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        border-bottom: 1px solid var(--border);
                    }

                    .close-modal {
                        background: none;
                        border: none;
                        font-size: 1.5rem;
                        cursor: pointer;
                        color: var(--text-secondary);
                    }

                    .video-placeholder {
                        height: 450px;
                        background: #f8fafc;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        color: var(--text-secondary);
                    }

                    .video-placeholder i {
                        font-size: 3rem;
                        margin-bottom: 1rem;
                    }
                `;
                    document.head.appendChild(style);

                    document.body.appendChild(modal);

                    // Close modal functionality
                    modal.querySelector('.close-modal').addEventListener('click', () => {
                        modal.remove();
                    });

                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.remove();
                        }
                    });
                }
            });
        });


        let progress = 0;
        const totalLessons = document.querySelectorAll('.lesson-item').length;
        const progressBar = document.querySelector('.progress');

        function updateProgress() {
            const completedLessons = document.querySelectorAll('.lesson-item.completed').length;
            progress = (completedLessons / totalLessons) * 100;
            progressBar.style.width = `${progress}%`;
        }

        // Initialize tooltips
        const tooltipStyle = document.createElement('style');
        tooltipStyle.textContent = `
        [data-tooltip] {
            position: relative;
        }

        [data-tooltip]:before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 0.5rem 1rem;
            background: var(--text-primary);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
        }

        [data-tooltip]:hover:before {
            opacity: 1;
            visibility: visible;
        }
    `;
        document.head.appendChild(tooltipStyle);
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>