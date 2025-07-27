from fastapi import FastAPI
from pydantic import BaseModel
from transformers import pipeline

app = FastAPI()
generator = pipeline("text-generation", model="mistralai/Mistral-7B-Instruct", device_map="auto")


class CodeInput(BaseModel):
    code: str
    lang: str = 'ar'


@app.post("/generate-doc")
async def generate_doc(data: CodeInput):
    if data.lang == 'en':
        prompt = f"Document the following code in a professional and concise way (English):\n{data.code}\nDocumentation:"
    else:
        prompt = f"وثّق الكود التالي بشكل احترافي ومختصر (عربي):\n{data.code}\nالتوثيق:"
    result = generator(prompt, max_new_tokens=200)[0]["generated_text"]
    return {"documentation": result}
