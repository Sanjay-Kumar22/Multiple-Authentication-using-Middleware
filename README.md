# 🚀 Laravel Project Setup Guide (Laravel प्रोजेक्ट कैसे चलाएं)

यह Laravel multiauthentication आधारित प्रोजेक्ट है जिसे आप अपने लोकल सिस्टम में सेटअप करके चला सकते हैं। नीचे दिए गए सभी स्टेप्स को ध्यान से फॉलो करें।

---

## 🧰 आवश्यकताएँ | Requirements

- ✅ PHP >= 8.1
- ✅ Composer (https://getcomposer.org)
- ✅ MySQL या अन्य डेटाबेस
- ✅ Node.js (अगर frontend इस्तेमाल हो रहा हो)
- ✅ Laravel CLI (`php artisan`)

---

## 📦 Step-by-Step Installation Guide

### 📁 Step 1: प्रोजेक्ट डाउनलोड या क्लोन करें

#### GitHub से क्लोन करें:
```bash
git clone https://github.com/your-username/your-project.git
cd your-project


 Step 2: Composer Dependencies इंस्टॉल करें
 composer install

  Step 3: .env फाइल खोलकर अपनी डेटाबेस की जानकारी भरें:
  DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=root
    DB_PASSWORD=your_password
    
Step 4: Application Key Generate करें
php artisan key:generate

 Step 5: डेटाबेस माइग्रेशन चलाएं
 php artisan migrate

 Step 6: प्रोजेक्ट रन करें
 php artisan serve