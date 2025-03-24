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
                  <div v-if="successMessage" class="alert alert-success" role="alert">
                    {{ successMessage }}
                  </div>

                  <form @submit.prevent="updateProfile">
                    <!-- Avatar Upload -->
                    <div class="form-group mb-4">

                    </div>

                    <!-- Name -->
                    <div class="form-group mb-3">
                      <label for="name">Name</label>
                      <input
                        type="text"
                        id="name"
                        v-model="form.full_name"
                        class="form-control"
                        required>
                      <p v-if="errors.name" class="text-danger mt-1">{{ errors.name }}</p>
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
                      <p v-if="errors.email" class="text-danger mt-1">{{ errors.email }}</p>
                    </div>





                    <button type="submit" class="btn btn-primary" :disabled="isSubmitting">
                      <span v-if="isSubmitting">Saving...</span>
                      <span v-else>Save Profile</span>
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
                  <div v-if="passwordSuccess" class="alert alert-success" role="alert">
                    {{ passwordSuccess }}
                  </div>

                  <form @submit.prevent="updatePassword">
                    <!-- Current Password -->
                    <div class="form-group mb-3">
                      <label for="current_password">Current Password</label>
                      <input
                        type="password"
                        id="current_password"
                        v-model="passwordForm.current_password"
                        class="form-control"
                        required>
                      <p v-if="passwordErrors.current_password" class="text-danger mt-1">
                        {{ passwordErrors.current_password }}
                      </p>
                    </div>

                    <!-- New Password -->
                    <div class="form-group mb-3">
                      <label for="password">New Password</label>
                      <input
                        type="password"
                        id="password"
                        v-model="passwordForm.password"
                        class="form-control"
                        required>
                      <p v-if="passwordErrors.password" class="text-danger mt-1">
                        {{ passwordErrors.password }}
                      </p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3">
                      <label for="password_confirmation">Confirm New Password</label>
                      <input
                        type="password"
                        id="password_confirmation"
                        v-model="passwordForm.password_confirmation"
                        class="form-control"
                        required>
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="isUpdatingPassword">
                      <span v-if="isUpdatingPassword">Updating...</span>
                      <span v-else>Update Password</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Profile Sidebar -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body text-center">
                  <!-- <img :src="user.avatar || '/images/default-avatar.png'"
                       class="rounded-circle mb-3"
                       width="128"
                       height="128"
                       alt="Profile Avatar"> -->

                       <div class="card-body text-center" v-if="user && user.created_at">
                        <h4>{{ user.full_name }}</h4>
                        <p class="text-muted">Joined {{ formatDate(user.created_at) }}</p>
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
  import api from '@/services/api.js';
  import axios from 'axios';


  export default {
    name: 'Profile',
    data() {
      return {
        user: {
        full_name: '',
        email: '',
        created_at: null
        },
        form: {
        full_name: '',
        email: '',
        },
        passwordForm: {
          current_password: '',
          password: '',
          password_confirmation: ''
        },
        errors: {},
        passwordErrors: {},
        successMessage: '',
        passwordSuccess: '',
        isSubmitting: false,
        isUpdatingPassword: false,
        avatarPreview: null,
        avatarError: ''
      };
    },
    created() {
      this.fetchUserProfile();
    },
    methods: {
        fetchUserProfile() {
    console.log("Attempting to fetch profile...");
    api.getProfile('/user')
        .then(response => {
        console.log("Response type:", typeof response.data);
        console.log("Raw API response:", response);

      // If response is HTML string instead of JSON object
      if (typeof response.data === 'string' && response.data.includes('<!DOCTYPE html>')) {
        console.error("Received HTML instead of JSON!");
        // Try to extract user data from meta tag if available
        const parser = new DOMParser();
        const doc = parser.parseFromString(response.data, 'text/html');
        const userMeta = doc.querySelector('meta[name="user"]');

        if (userMeta && userMeta.content) {
          try {
            const userData = JSON.parse(userMeta.content);
            console.log("Extracted user data from meta tag:", userData);
            this.user = userData;
            this.form.full_name = this.user.full_name || '';
            this.form.email = this.user.email || '';
          } catch (e) {
            console.error("Failed to parse user data from meta tag:", e);
          }
        }
      } else if (response.data && response.data.user) {
        this.user = response.data.user;
        this.form.full_name = this.user.full_name || '';
        this.form.email = this.user.email || '';
        console.log("User data set:", this.user);
      } else if (response.data && typeof response.data === 'object') {
        // Maybe the user data is directly in response.data
        console.log("Trying to use response.data directly:", response.data);
        this.user = response.data;
        this.form.full_name = this.user.full_name || '';
        this.form.email = this.user.email || '';
      } else {
        console.error("Unexpected API response format:", response.data);
      }
    })
    .catch(error => {
      console.error("Error fetching profile:", error);
      if (error.response) {
        console.error("Status:", error.response.status);
        console.error("Data:", error.response.data);
      }
    });
        },


      updateProfile() {
        this.isSubmitting = true;
        this.errors = {};
        this.successMessage = '';

        api.updateProfile(this.form)
          .then(response => {
            this.user = response.data.user;
            this.successMessage = response.data.message;
            window.scrollTo(0, 0);
          })
          .catch(error => {
            if (error.response && error.response.data && error.response.data.errors) {
              this.errors = error.response.data.errors;
            } else {
              console.error('Error updating profile:', error);
            }
          })
          .finally(() => {
            this.isSubmitting = false;
          });
      },
      handleAvatarChange(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Validate file
        if (!file.type.match('image.*')) {
          this.avatarError = 'Please select an image file';
          return;
        }

        if (file.size > 1024 * 1024) {
          this.avatarError = 'Image should not exceed 1MB';
          return;
        }

        this.avatarError = '';

        // Create preview
        const reader = new FileReader();
        reader.onload = e => {
          this.avatarPreview = e.target.result;
        };
        reader.readAsDataURL(file);

        // Upload avatar
        const formData = new FormData();
        formData.append('avatar', file);

        api.uploadAvatar(formData)
          .then(response => {
            this.user.avatar = response.data.avatar_url;
            this.successMessage = response.data.message;
            window.scrollTo(0, 0);
          })
          .catch(error => {
            if (error.response && error.response.data && error.response.data.errors) {
              this.avatarError = error.response.data.errors.avatar[0];
            } else {
              console.error('Error uploading avatar:', error);
              this.avatarError = 'Error uploading avatar';
            }
          });
      },
      updatePassword() {
        this.isUpdatingPassword = true;
        this.passwordErrors = {};
        this.passwordSuccess = '';

        api.updatePassword(this.passwordForm)
          .then(response => {
            this.passwordSuccess = response.data.message;
            this.passwordForm.current_password = '';
            this.passwordForm.password = '';
            this.passwordForm.password_confirmation = '';
            window.scrollTo(0, 0);
          })
          .catch(error => {
            if (error.response && error.response.data && error.response.data.errors) {
              this.passwordErrors = error.response.data.errors;
            } else {
              console.error('Error updating password:', error);
            }
          })
          .finally(() => {
            this.isUpdatingPassword = false;
          });
      },
      formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
      },
      formatWebsite(url) {
        if (!url) return '';
        try {
          const urlObj = new URL(url);
          return urlObj.hostname;
        } catch (e) {
          return url;
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
