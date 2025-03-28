<template>
    <div class="profile-page">
      <section class="profile-header">
        <div class="container">
          <h1 v-if="user && user.full_name">{{ user.full_name }}</h1>
          <h1 v-else>Loading...</h1>
        </div>
      </section>

      <section class="profile-content">
        <div class="container">
          <div class="row">
            <!-- Profile Form -->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h3>Profile Information</h3>
                  <p class="text-muted">Update your account's profile information</p>
                </div>
                <div class="card-body">
                  <!-- <div v-if="successMessage" class="alert alert-success" role="alert">
                    {{ successMessage }}
                  </div> -->

                  <form @submit.prevent="updateProfile">
                    <!-- Name -->
                    <div class="form-group mb-3">
                      <label for="name">Name</label>
                      <input
                        type="text"
                        id="name"
                        v-model="form.full_name"
                        class="form-control"
                        required>
                      <!-- <p v-if="errors.name" class="text-danger mt-1">{{ errors.name }}</p> -->
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="form-control"
                        required>
                      <!-- <p v-if="errors.email" class="text-danger mt-1">{{ errors.email }}</p> -->
                    </div>
                    <!-- Phone Number -->
                    <div class="form-group mb-3">
                      <label for="email">Phone Number</label>
                      <input
                        type="text"
                        id="email"
                        v-model="form.phone_number"
                        class="form-control"
                        required>
                      <!-- <p v-if="errors.email" class="text-danger mt-1">{{ errors.email }}</p> -->
                    </div>
                    <button type="submit" class="btn btn-primary">
                      Save Profile
                    </button>
                  </form>
                </div>
              </div>

              <!-- Password Update Form -->
              <div class="card mt-4">
                <div class="card-header">
                  <h3>Update Password</h3>
                  <p class="text-muted">Ensure your account is using a secure password</p>
                </div>
                <div class="card-body">
                  <!-- <div v-if="passwordSuccess" class="alert alert-success" role="alert">
                    {{ passwordSuccess }}
                  </div> -->

                  <form @submit.prevent="updatePassword">
                    <!-- Current Password -->
                    <div class="form-group mb-3">
                      <label for="current_password">Current Password</label>
                      <!-- <input
                        type="password"
                        id="current_password"
                        v-model="passwordForm.current_password"
                        class="form-control"
                        required> -->
                      <!-- <p v-if="passwordErrors.current_password" class="text-danger mt-1">
                        {{ passwordErrors.current_password }}
                      </p> -->
                    </div>

                    <!-- New Password -->
                    <div class="form-group mb-3">
                      <label for="password">New Password</label>
                      <!-- <input
                        type="password"
                        id="password"
                        v-model="passwordForm.password"
                        class="form-control"
                        required> -->
                      <!-- <p v-if="passwordErrors.password" class="text-danger mt-1">
                        {{ passwordErrors.password }}
                      </p> -->
                    </div>

                    <!-- Confirm Password -->
                    <!-- <div class="form-group mb-3">
                      <label for="password_confirmation">Confirm New Password</label>
                      <input
                        type="password"
                        id="password_confirmation"
                        v-model="passwordForm.password_confirmation"
                        class="form-control"
                        required>
                    </div> -->

                    <!-- <button type="submit" class="btn btn-primary" :disabled="isUpdatingPassword">
                      <span v-if="isUpdatingPassword">Updating...</span>
                      <span v-else>Update Password</span>
                    </button> -->
                  </form>
                </div>
              </div>
            </div>

            <!-- Profile Sidebar -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <img :src="user.picture"
                       class="rounded-circle mb-3"
                       width="28"
                       height="28"
                       >

                       <div class="card-body" v-if="user && user.full_name">
                        <!-- Full name -->
                        <div class="flex flex-row space-x-3">
                            <h4>Full Name:</h4>
                            <h5 >{{ user.full_name }}</h5>
                        </div>
                        <!-- Email -->
                        <div class="flex flex-row space-x-3">
                            <h4>Email:</h4>
                            <h5>{{ user.email }}</h5>
                        </div>
                        <!-- Phone number -->
                        <div class="flex flex-row space-x-3">
                            <h4>Phone:</h4>
                            <h5>{{ user.phone_number }}</h5>
                        </div>
                        <!-- <p class="text-muted">Joined {{ formatDate(user.created_at) }}</p> -->
                       </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </template>

  <script>
  import { fetchUser, updateUser } from '../utils/api.js';


  export default {
    name: 'Profile',
    data() {
      return {
        user: {
        full_name: '',
        email: '',
        phone_number:'',
        picture:'',
        created_at: '',
        },

        form: {
        full_name: '',
        email: '',
        phone_number:'',
        picture:'',
        },
      };
    },
    created() {
      this.showUser();
    },
    methods: {
        showUser() {
            fetchUser()
            .then(response => {
            // console.log("Response type:", typeof response);
            // console.log("Raw API response:", response);

            // Directly set user data
            this.user = response;

            // Populate form with user data
            this.form.full_name = response.full_name || '';
            this.form.email = response.email || '';
            this.form.phone_number = response.phone_number || '';
            this.form.picture = response.picture || '';
            // console.log("Updated user data:", this.user);
            // console.log("Updated form data:", this.form);
            })
            .catch(error => {
            console.error("Error fetching profile:", error);
            if (error.response) {
                console.error("Status:", error.response.status);
                console.error("Data:", error.response.data);
            }
            });
        },

  // Optional: Add a method to format date
        formatDate(dateString) {
            if (!dateString) return 'N/A';
            return new Date(dateString).toLocaleDateString();
        },
        // update profile
        async updateProfile() {
            try {
                if (!this.form.full_name || !this.form.email || !this.form.phone_number) {
                    alert("Please fill in all required fields.");
                    return;
                }

                console.log("Updating profile with:", this.form);

                const updatedUser = await updateUser(this.form); // Pass `this.form` to the function

                if (updatedUser) {
                    this.user = updatedUser;
                    alert("Profile updated successfully!");
                } else {
                    alert("Something went wrong. Try again.");
                }
            } catch (error) {
                console.error("Profile update error:", error);
                alert("Failed to update profile.");
            }
    }


    }
  };
  </script>

  <style scoped>
  .profile-header {
    background-color: #f8f9fa;
    padding: 2rem 0;
    margin-bottom: 2rem;
  }

  .card {
    margin-bottom: 1.5rem;
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  }

  .card-header {
    background-color: transparent;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    padding: 1.5rem;
  }

  .card-header h3 {
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  .avatar-container {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
  }
  </style>
